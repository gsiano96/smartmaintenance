<?php
/**
 * Class OnCallActivities
 *
 * {ControllerResponsability}
 *
 * @package controllers\maintainer
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers\maintainer;

use framework\Controller;
use framework\Model;
use framework\View;
use models\maintainer\OnCallActivities as OnCallActivitiesModel;
use views\maintainer\OnCallActivities as OnCallActivitiesView;

class OnCallActivities extends Controller
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
        $iden = $this->getWhatYouGet();
        $activities = $this->model->getOnCallActivitiesFromDb($iden);
        $this->view->setOnCallActivityRow($activities);
    }

    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {

    }

    private function getWhatYouGet()
    {
        foreach ($_GET as $get_variable => $value) {
            return $value;
        }
    }

    /**
    * Inizialize the View by loading static design of /maintainer/on_call_activities.html.tpl
    * managed by views\maintainer\OnCallActivities class
    *
    */
    public function getView()
    {
        $view = new OnCallActivitiesView("/maintainer/on_call_activities");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\maintainer\OnCallActivities class
    *
    */
    public function getModel()
    {
        $model = new OnCallActivitiesModel();
        return $model;
    }
}
