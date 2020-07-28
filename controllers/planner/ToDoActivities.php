<?php
/**
 * Class ToDoActivities
 *
 * {ControllerResponsability}
 *
 * @package controllers
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers\planner;

use framework\Controller;
use framework\Model;
use framework\View;

use models\planner\ToDoActivities as ToDoActivitiesModel;
use views\planner\ToDoActivities as ToDoActivitiesView;

class ToDoActivities extends Controller
{
    protected $view;
    protected $model;

    /**
    * Object constructor.
    *
    * @param View $view
    * @param Model $mode
    */
    public function __construct(View $view=null, Model $model=null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view,$this->model);



    }


    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {
        /*------------ INIZIO SEZIONE DI GESTIONE ACCESSO -----------------*/
        $this->grantRole(ADMIN_ROLE_ID);  // Administrator
        $this->grantRole(MAINTAINER_ROLE_ID);   // Manager (see access_level table)
        $this->user = $this->restrictToAuthentication(null, "planner/to_do_activities");
        $usrIden = $this->user->getId();

        if(isset($_GET["logout"])){
            $this->user->logout();
            header("Location: to_do_activities");
        }


        //Session parameters
        //$week=23;
        $week=$this->view->getCurrentWeek();
       // Model
        $activities = $this->model->getActivities($week);

       // View
       //$this->view->setHeader($week);
        $this->view->setActivitiesBlock($activities);

        /*------------ GESTIONE NAVBAR -----------------*/
        /*------------ QUERY1 -----------------*/
        $this->model->sql=<<<SQL
        SELECT full_name from user where id_user=$usrIden
SQL;
        $this->model->updateResultSet();
        $full_name=($this->model->getResultSet())->fetch_assoc()["full_name"];
        $this->view->setVar("planner",$full_name);

        /*------------ QUERY2 -----------------*/
        $this->model->sql=<<<SQL
        SELECT count(*) as counter from maintenance_procedure where procedure_class='planned procedure' and week=$week
SQL;
        $this->model->updateResultSet();
        $counter=($this->model->getResultSet())->fetch_assoc()["counter"];
        $this->view->setVar("plannedStatistic",$counter);

        /*------------ QUERY3 -----------------*/
        $this->model->sql=<<<SQL
        SELECT count(*) as counter from maintenance_procedure where procedure_class='unplanned procedure (ewo)' and week=$week
SQL;
        $this->model->updateResultSet();
        $counter=($this->model->getResultSet())->fetch_assoc()["counter"];
        $this->view->setVar("unplannedStatistic",$counter);

    }

    /**
    * Inizialize the View by loading static design of /to_do_activities.html.tpl
    * managed by views\ToDoActivities class
    *
    */
    public function getView()
    {
        $view = new ToDoActivitiesView("/planner/to_do_activities");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\ToDoActivities class
    *
    */
    public function getModel()
    {
        $model = new ToDoActivitiesModel();
        return $model;
    }

}
