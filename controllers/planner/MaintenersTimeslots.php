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
    protected /*MaintenersTimeslotsView*/ $view;
    protected /*MaintenersTimeslotsModel*/ $model;

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
        $_GET["week"] = 23;
        $_GET["year"] = 2020;
        $_GET["day"] = 1;
        $_GET["maintenance_id"] = 2;
        $_GET["maintenance_description"] = "Prova";
        $_GET["maintener_id"] = 383;

        $ava_timeslots = $this->model->getMinutesAvailabilities($_GET["maintener_id"], $_GET["day"], $_GET["week"], $_GET["year"]);
        //print_r($ava_timeslots);
        $maintener_name=$this->model->getMaintenerFullNameById($_GET["maintener_id"]);
        $day_availab = $this->model->getDayAvailability($_GET["maintener_id"], $_GET["week"], $_GET["year"], $_GET["day"]);
        
        $sql_res = $this->model->getMaintenerSkills($_GET["maintener_id"]);
        $skill = 0;
        while ($row = $sql_res->fetch_assoc()) {
            $availableSkills[$skill] = $row["id_skill"];
            $skill++;
        }

        $sql_requiredSkills = $this->model->getMaintenanceProcedureSkills($_GET["maintenance_id"]);

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

        $this->view->setMaintenersTimeslots($maintener_name, $availableSkillsNumber, $requiredSkillsNumber, $ava_timeslots, 30);
        $this->view->setDayAvailability($day_availab);
        $this->view->setWorkspaceNotes("");
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
