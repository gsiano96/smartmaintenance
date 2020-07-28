<?php

namespace controllers\planner;

use framework\Controller;
use framework\Model;
use framework\View;
use models\Index;
use models\planner\Ewocompilation as EwocompilationModel;
use views\planner\Ewocompilation as EwocompilationView;

class Ewocompilation extends Controller
{
    /**
     * Home constructor.
     * @override parent constructor
     */
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
        $this->user = $this->restrictToAuthentication(null, "planner/ewo_compilation");
        $usrIden = $this->user->getId();

        if(isset($_GET["logout"])){
            $this->user->logout();
            header("Location: to_do_activities");
        }



        $activityEWO=2;
        $activityInfo="$activityEWO - Fisciano Molding - Hydraulic";
        $dayName="Monday";
        $dayNum=18;
        $workspacenotes="Plant stopped from 12:23 P.M. panding intervention.\r\n Smoke from the 4th compressor as a result of loud noise";
        $procedure="unplanned procedure (ewo)";
        $tipo="Hydraulic";
        $estimate=$_GET["Estimatedtime"];
        $activi_desc=$_GET["activInfo"];
        //$this->view->getCurrentWeek();
        $week=$this->view->getCurrentWeek();


        $this->view->setActivityinfo($activityInfo);
        $this->view->setDay($dayName,$dayNum);
        $this->view->setWorkspace($workspacenotes);

        $skill=$this->model->getSkill();
        if ($skill->num_rows != 0) {
            $skills = 0;
            while ($row = $skill->fetch_assoc()) {
                $requiredSkillsLabel[$skills] = $row["name"];
                $skills++;

            }

        }
        $this->view->setSkill($requiredSkillsLabel);
        if (isset($_GET["submit"])) {
            $this->model->insertEWO($estimate, $activi_desc, $week, $tipo, $procedure, $workspacenotes);
            $activityId = $this->model->getIdactivity();
            while ($row = $activityId->fetch_assoc()) {
                $requiredId = $row["id"];
            }

                $count=0;
                foreach ($_GET["skills"] as $value){
                    $requireSkill[$count]=$value;
                    $count++;
                    //echo "-$value";
                }


               header("Location: http://localhost/smartmaintenance/planner/ewo_timeslots?activId=$requiredId&day=$dayNum&week=$week&activInfo= $activityInfo");
        }

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
        $view = new EwocompilationView("/planner/ewo_compilation");
        return $view;
    }

    /**
     * Inizialize the Model by loading models\ToDoActivities class
     *
     */
   public function getModel()
    {
        $model = new EwocompilationModel();
        return $model;
    }

}
