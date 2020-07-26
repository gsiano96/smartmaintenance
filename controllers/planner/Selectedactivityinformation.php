<?php

namespace controllers\planner;

use framework\Controller;
use framework\Model;
use framework\View;
use models\planner\Selectedactivityinformation as SelectedactivityinformationModel;
use views\planner\Selectedactivityinformation as SelectedactivityinformationView;

class Selectedactivityinformation extends Controller
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

        $this->view->getCurrentWeek();
    }

    /**
     * Inizialize the View by loading static design of /to_do_activities.html.tpl
     * managed by views\ToDoActivities class
     *
     */
    public function getView()
    {
        $view = new SelectedactivityinformationView("/planner/selected_activity_information");
        return $view;
    }

    /**
     * Inizialize the Model by loading models\ToDoActivities class
     *
     */
    public function getModel()
    {
        $model = new SelectedactivityinformationModel();
        return $model;
    }

}