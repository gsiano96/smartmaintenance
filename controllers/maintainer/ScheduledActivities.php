<?php
/**
 * Class ScheduledActivities
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
use models\maintainer\ScheduledActivities as ScheduledActivitiesModel;
use views\maintainer\ScheduledActivities as ScheduledActivitiesView;

class ScheduledActivities extends Controller
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
        $this->grantRole(ADMIN_ROLE_ID);  // Administrator
        $this->grantRole(MAINTAINER_ROLE_ID);   // Manager (see access_level table)
        $this->user = $this->restrictToAuthentication(null, "maintainer/scheduled_activities");
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view, $this->model);
        $iden = $this->user->getId();
        $activities = $this->model->getScheduledActivitiesFromDb($iden);
        $this->view->setScheduledActivityRow($iden, $activities);
        /*------------ INIZIO SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
        $data = $this->model->getNameById($iden);
        $this->view->setMaintainerNameRow($data);
        $stats = $this->model->getStatsById($iden);
        $this->view->setNavbarStats($stats, $iden);
        /*------------ FINE SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
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
    * Inizialize the View by loading static design of /maintainer/scheduled_activities.html.tpl
    * managed by views\maintainer\ScheduledActivities class
    *
    */
    public function getView()
    {
        $view = new ScheduledActivitiesView("/maintainer/scheduled_activities");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\maintainer\ScheduledActivities class
    *
    */
    public function getModel()
    {
        $model = new ScheduledActivitiesModel();
        return $model;
    }
}
