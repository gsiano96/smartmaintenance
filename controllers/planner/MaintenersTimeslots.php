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
namespace controllers\planner;

use framework\Controller;
use framework\Model;
use framework\View;

use models\planner\MaintenersTimeslots as MaintenersTimeslotsModel;
use views\planner\MaintenersTimeslots as MaintenersTimeslotsView;

class MaintenersTimeslots extends Controller
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

        //Session parameters
        $_GET["planner"]="planner";
        //$_GET["week"] = 23;
        $_GET["year"] = 2020;
        //$_GET["day"] = 1;
        //$_GET["activityId"] = 2;
        //$_GET["maintainerId"] = 383;

        //Model
        $ava_timeslots = $this->model->getMinutesAvailabilities($_GET["maintainerId"], $_GET["day"], $_GET["week"], $_GET["year"]);
        //print_r($ava_timeslots);
        $maintener_name=$this->model->getMaintenerFullNameById($_GET["maintainerId"]);
        
        $day_availab = $this->model->getDayAvailability($_GET["maintainerId"], $_GET["week"], $_GET["year"], $_GET["day"]);
        $activity_minutes=$this->model->getMaintenenaceDurationById($_GET["activityId"]);
        
        $sql_res = $this->model->getMaintenerSkills($_GET["maintainerId"]);
        $skill = 0;
        while ($row = $sql_res->fetch_assoc()) {
            $availableSkills[$skill] = $row["id_skill"];
            $skill++;
        }

        $sql_requiredSkills = $this->model->getMaintenanceProcedureSkills($_GET["activityId"]);
        //print_r($sql_requiredSkills);
        if ($sql_requiredSkills->num_rows != 0) {
            $skill = 0;
            while ($row = $sql_requiredSkills->fetch_assoc()) {
                $requiredSkills[$skill] = $row["id_skill"];
                //$requiredSkillsLabel[$skill]=$row["name"];
                $skill++;
            }
            $requiredSkillsNumber = 0; //count entries
            foreach ($requiredSkills as $req_skill) {
                $requiredSkillsNumber++;
            }

            $availableSkillsNumber = 0;
            foreach ($requiredSkills as $req_skill) {
                foreach ($availableSkills as $ava_skill) {
                    if ($ava_skill == $req_skill) {
                        $availableSkillsNumber++;
                    }
                }
            }
        } else {
            //Initializes a list of skills number for each mantainer to 0
            $availableSkillsNumber = array();
            $availableSkillsNumber = $this->model->getMaintainerSkillsNumber($_GET["maintainerId"]);
            $requiredSkillsNumber = 0;
        }

        //View
        $this->view->setHeader($_GET["week"],$_GET["day"],$_GET["activityInfo"],$maintener_name);
        $this->view->setMaintenersTimeslots($maintener_name, $availableSkillsNumber, $requiredSkillsNumber, $ava_timeslots, $activity_minutes);
        $this->view->setDayAvailability($day_availab);
        $this->view->setWorkspaceNotes("Note");
        
    }

    /**
    * Inizialize the View by loading static design of /mainteners_availability.html.tpl
    * managed by views\MaintenersAvailability class
    *
    */
    public function getView() : MaintenersTimeslotsView
    {
        $view = new MaintenersTimeslotsView("/planner/mainteners_timeslots");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\MaintenersAvailability class
    *
    */
    public function getModel() : MaintenersTimeslotsModel 
    {
        $model = new MaintenersTimeslotsModel();
        return $model;
    }
}
