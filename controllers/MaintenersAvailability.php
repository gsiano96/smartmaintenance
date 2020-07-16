<?php
/**
 * Class MaintenersAvailability
 *
 * {ControllerResponsability}
 *
 * @package controllers
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers;

use framework\Controller;
use framework\Model;
use framework\View;
use models\MaintenersAvailability as MaintenersAvailabilityModel;
use views\MaintenersAvailability as MaintenersAvailabilityView;

class MaintenersAvailability extends Controller
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

    }

    /**
    * Inizialize the View by loading static design of /mainteners_availability.html.tpl
    * managed by views\MaintenersAvailability class
    *
    */
    public function getView()
    {
        $view = new MaintenersAvailabilityView("/mainteners_availability");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\MaintenersAvailability class
    *
    */
    public function getModel()
    {
        $model = new MaintenersAvailabilityModel();
        return $model;
    }
}
