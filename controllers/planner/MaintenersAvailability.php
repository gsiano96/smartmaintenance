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
        /*------------ INIZIO SEZIONE DI GESTIONE ACCESSO -----------------*/
        $this->grantRole(ADMIN_ROLE_ID);  // Administrator
        $this->grantRole(MAINTAINER_ROLE_ID);   // Manager (see access_level table)
        $this->user = $this->restrictToAuthentication(null, "planner/to_do_activities");
        $usrIden = $this->user->getId();

        if(isset($_GET["logout"])){
            $this->user->logout();
            header("Location: to_do_activities");
        }
        // Session parameters
        //$_GET["week"]=23;
        $_GET["year"]=2020;
        //$_GET["activityId"]=1;
        //$_GET["activityInfo"]="Descrizione";

        $sql_maintList=$this->model->getMaintenerList();
        //print_r($sql_maintList);

        for($i=0;$i<$sql_maintList->num_rows;$i++){
            $mainteners[$i]=$sql_maintList->fetch_assoc();
            $sql_res=$this->model->getMaintenerSkills($mainteners[$i]["id_user"]);

            $skill=0;
            while($row=$sql_res->fetch_assoc()){
                $availableSkills[$i][$skill]=$row["id_skill"];
                $skill++;
            }

            $availability[$i]=$this->model->getAvailabilityAllDays($mainteners[$i]["id_user"],$_GET["week"],$_GET["year"]);
        }

        $sql_requiredSkills=$this->model->getMaintenanceProcedureSkills($_GET["activityId"]);
        //print_r($sql_requiredSkills);
        
        if ($sql_requiredSkills->num_rows != 0) {

            //Lists all required skills ids and names
            $skill = 0;
            while ($row = $sql_requiredSkills->fetch_assoc()) {
                $requiredSkills[$skill] = $row["id_skill"];
                $requiredSkillsLabel[$skill] = $row["name"];
                $skill++;
            }

            //Counts all entries in the previous list
            $requiredSkillsNumber = 0;
            foreach ($requiredSkills as $req_skill) {
                $requiredSkillsNumber++;
            }

            //Initializes a list of skills number for each mantainer to 0
            $availableSkillsNumber = array();
            for ($i = 0; $i < $sql_maintList->num_rows; $i++) {
                $availableSkillsNumber[$i] = 0;
            }

            //For each maintainer, increments the relative skills number if it matchs a required one
            for ($i = 0; $i < $sql_maintList->num_rows; $i++) {
                foreach ($requiredSkills as $req_skill) {
                    foreach ($availableSkills[$i] as $ava_skill) {
                        if ($ava_skill == $req_skill) {
                            $availableSkillsNumber[$i]++;
                        }
                    }
                }
            }

            $this->view->setSkillsList($requiredSkillsLabel);
        } else {
            //Initializes a list of skills number for each mantainer to 0
            $availableSkillsNumber = array();
            for ($i = 0; $i < $sql_maintList->num_rows; $i++) {
                $availableSkillsNumber[$i] = $this->model->getMaintainerSkillsNumber($mainteners[$i]["id_user"]);
            }
            $requiredSkillsNumber = 0;
            $this->view->setVar("maintSkillsList","No skill is required");
        }

        $this->view->setMaintenersAvailability($mainteners,$availableSkillsNumber,$requiredSkillsNumber,$availability, $_GET["week"], $_GET["activityId"], $_GET["activityInfo"]);
        $this->view->setHeader($_GET["week"],$_GET["activityInfo"]);

        /*------------ GESTIONE NAVBAR -----------------*/
        /*------------ QUERY1 -----------------*/
        $this->model->sql=<<<SQL
        SELECT full_name from user where id_user=$usrIden
SQL;
        $this->model->updateResultSet();
        $full_name=($this->model->getResultSet())->fetch_assoc()["full_name"];
        $this->view->setVar("planner",$full_name);

        /*------------ QUERY2 -----------------*/
        $this->model->sql=<<<SQL
        SELECT count(*) as counter from maintenance_procedure where procedure_class='planned procedure' and week={$_GET["week"]}
SQL;
        $this->model->updateResultSet();
        $counter=($this->model->getResultSet())->fetch_assoc()["counter"];
        $this->view->setVar("plannedStatistic",$counter);

        /*------------ QUERY3 -----------------*/
        $this->model->sql=<<<SQL
        SELECT count(*) as counter from maintenance_procedure where procedure_class='unplanned procedure (ewo)' and week={$_GET["week"]}
SQL;
        $this->model->updateResultSet();
        $counter=($this->model->getResultSet())->fetch_assoc()["counter"];
        $this->view->setVar("unplannedStatistic",$counter);
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
