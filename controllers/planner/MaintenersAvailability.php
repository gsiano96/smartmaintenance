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

use models\planner\MaintenersAvailability as MaintenersAvailabilityModel;
use views\planner\MaintenersAvailability as MaintenersAvailabilityView;

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
        $_GET["week"]=23;
        $_GET["year"]=2020;
        $_GET["maintenance_id"]=2;

        $sql_maintList=$this->model->getMaintenerList();

        for($i=0;$i<$sql_maintList->num_rows;$i++){
            $mainteners[$i]=$sql_maintList->fetch_array();
            //echo $mainteners[$i]["employee_id"];
            $sql_res=$this->model->getMaintenerSkills($mainteners[$i]["id_user"]);

            $skill=0;
            while($row=$sql_res->fetch_array()){
                $availableSkills[$i][$skill]=$row["id_skill"];
                $skill++;
            }

            $availability[$i]=$this->model->getAvailabilityAllDays($mainteners[$i]["id_user"],$_GET["week"],$_GET["year"]);
        }

        $sql_requiredSkills=$this->model->getMaintenanceProcedureSkills($_GET["maintenance_id"]);
        
        $skill=0;
        while($row=$sql_requiredSkills->fetch_array()){
            $requiredSkills[$skill]=$row["id_skill"];
            $requiredSkillsLabel[$skill]=$row["name"];
            $skill++;
        }

        $requiredSkillsNumber=0; //count entries
        foreach($requiredSkills as $req_skill){
           $requiredSkillsNumber++;
        }
        
        $availableSkillsNumber=array(); //inizialization to 0
        for ($i=0;$i<$sql_maintList->num_rows;$i++){
            $availableSkillsNumber[$i]=0;
        }

        for ($i = 0; $i < $sql_maintList->num_rows; $i++) {
            foreach ($requiredSkills as $req_skill) {
                foreach ($availableSkills[$i] as $ava_skill) {
                    if ($ava_skill == $req_skill) {
                        $availableSkillsNumber[$i]++;
                    }
                }
            }
        }

        $this->view->setMaintenersAvailability($mainteners,$availableSkillsNumber,$requiredSkillsNumber,$availability);
        $this->view->setSkillsList($requiredSkillsLabel);
    }

    /**
    * Inizialize the View by loading static design of /mainteners_availability.html.tpl
    * managed by views\MaintenersAvailability class
    *
    */
    public function getView() : MaintenersAvailabilityView
    {
        $view = new MaintenersAvailabilityView("/planner/mainteners_availability");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\MaintenersAvailability class
    *
    */
    public function getModel() : MaintenersAvailabilityModel
    {
        $model = new MaintenersAvailabilityModel();
        return $model;
    }
}
