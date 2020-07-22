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
       // get the mysqli_result set from model
       $activities = $this->model->getActivities();
       // Pass it to view method to show itself in the relative block of the template
       $this->view->setActivitiesBlock($activities);
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
