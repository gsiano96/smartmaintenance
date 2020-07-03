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
        $this->grantRole(ADMIN_ROLE_ID);  // Administrator
        $this->grantRole(MAINTAINER_ROLE_ID);   // Manager (see access_level table)
        $this->user = $this->restrictToAuthentication(null, "maintainer/scheduled_activities_screen");
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view, $this->model);
        $getResult = $this->getWhatYouGet();
        $IDAct = $getResult["idenD"];
        $iden = $this->user->getId();
        $activity = $this->model->getScheduledActivityFromDb($IDAct);
        $this->view->setScheduledActivityScreenRow($activity);
        $materials = $this->model->getMaterialsForActivityFromDb($IDAct);
        $this->view->setMaterialActivityScreenRow($materials);
        $notes = $this->model->getNoteForActivityFromDb($IDAct);
        $this->view->setNoteActivityScreenRow($notes);
        $inter = $this->model->getInterForActivityFromDb($IDAct);
        $this->view->setManageButtonActivityScreenRow($inter,$iden);
        $StartStop = $this->handleStartStopVisual();
        $this->view->setStartStopRows($StartStop[0],$StartStop[1],$iden,$inter);
    }

    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {
        $this->handleFormActionsSubmission();
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
            $elem[$get_variable] = $value;
        }
        return $elem;
    }

/*--------------- INIZIO SEZIONE DI INSERIMENTO DATABASE & GESTIONE $POST --------------------*/

    private function handleFormActionsSubmission()
    {
        $getResult = $this->getWhatYouGet();
        $IDAct = $getResult["idenD"];
        $iden = $this->user->getId();
        $inter = $this->model->getInterForActivityFromDb($IDAct);
        foreach ($inter as $int)
            $tmp = $int["ActInter"];
        $this->model->select($iden,$IDAct);
        if (isset($_POST["timeStart"]) || isset($_POST["timeStop"]) || isset($_POST["timeStopInt"])) {
            $this->handlePostFields();
            $this->model->update($iden,$IDAct);
            if(isset($_POST["timeStop"]) && $tmp == 0)
                header("location: index?iden=".$iden);
            elseif (isset($_POST["timeStopInt"]) && $tmp == 1)
                header("location: on_call_activities?iden=".$iden);
        }
    }

    private function handlePostFields()
    {
        if (isset($_POST["timeStart"]))
            $this->model->setStartDatetime(@$_POST["ActStart"]);
        if (isset($_POST["timeStop"]) || isset($_POST["timeStopInt"]))
            $this->model->setStopDatetime(@$_POST["ActStop"]);
     }
/*--------------- FINE SEZIONE DI INSERIMENTO DATABASE & GESTIONE $POST --------------------*/

    private function handleStartStopVisual()
    {
        $getResult = $this->getWhatYouGet();
        $IDAct = $getResult["idenD"];
        $iden = $this->user->getId();
        $this->model->select($iden, $IDAct);
        $startT = $this->model->getStartDatetime();
        $stopT = $this->model->getStopDatetime();
        $param = array($startT, $stopT);
        return $param;
    }
}
