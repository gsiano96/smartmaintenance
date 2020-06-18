<?php
/**
 * Class ScheduledActivitiesScreen
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
use models\maintainer\ScheduledActivitiesScreen as ScheduledActivitiesScreenModel;
use views\maintainer\ScheduledActivitiesScreen as ScheduledActivitiesScreenView;

class ScheduledActivitiesScreen extends Controller
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

        $IDAct = $this->getWhatYouGet();
        $activity = $this->model->getScheduledActivityFromDb($IDAct);
        $this->view->setScheduledActivityScreenRow($activity);
        $materials = $this->model->getMaterialsForActivityFromDb($IDAct);
        $this->view->setMaterialActivityScreenRow($materials);
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
    * Inizialize the View by loading static design of /maintainer/scheduled_activities_screen.html.tpl
    * managed by views\maintainer\ScheduledActivitiesScreen class
    *
    */
    public function getView()
    {
        $view = new ScheduledActivitiesScreenView("/maintainer/scheduled_activities_screen");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\maintainer\ScheduledActivitiesScreen class
    *
    */
    public function getModel()
    {
        $model = new ScheduledActivitiesScreenModel();
        return $model;
    }

    private function getWhatYouGet()
    {
        foreach($_GET as $get_variable => $value) {
            return $value;
        }
    }
}
