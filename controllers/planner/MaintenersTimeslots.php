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
    protected  $view;
    protected  $model;

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

        //Session parameters (first invocation)
        $_GET["planner"]="planner";
        //$_GET["week"] = 23;
        //$_GET["activityId"] = 2;
        //$_GET["activityInfo"]
        //$_GET["maintainerId"] = 383;
        //$_GET["day"] = 1;
        $_GET["year"] = 2020;

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

        //Save parameters for a second invocation
        $this->view->setHistoryParameters($_GET["week"], $_GET["activityId"], $_GET["activityInfo"], $_GET["maintainerId"],$_GET["day"]);

        //Only on submit
        if(isset($_GET["status"])){

            $status=$this->model->isEmptyMaintenerOccupation($_GET["maintainerId"], $_GET["week"], $_GET["year"], $_GET["day"]);
            
            $status2=$this->model->isEmptyMaintainerActivityId($_GET["maintainerId"],$_GET["activityId"]);
            if($status2 == false){ //Insert one association maintainer_maintenance_procedure (No duplicates)
                $success=0;
                header("Location: http://localhost/smartmaintenance/planner/mainteners_timeslots?week={$_GET["week"]}&activityId={$_GET["activityId"]}&activityInfo={$_GET["activityInfo"]}&maintainerId={$_GET["maintainerId"]}&day={$_GET["day"]}&success=$success");
            }

            $activity_minutes=$this->model->getMaintenenaceDurationById($_GET["activityId"]);
            $success=false;
            
            //First timeslots allocation
            if($status){
                
                $timeslots=$this->getNewOccupations();
                $verifies=$this->verifyTimeslots($timeslots,$activity_minutes);

                $timeslots=$verifies[0];
                $success=$verifies[1];
                if($success==1){ //Insert one entry for activity id
                    $this->model->setMaintainerActivityId($_GET["maintainerId"],$_GET["activityId"]);
                    $this->model->setMaintainerOccupation($_GET["maintainerId"], $_GET["week"], $_GET["year"], $_GET["day"], $timeslots);
                }

            }else{ //Successive allocations from different activityId
                //Get current occupations as numerical array
                $base_timeslots=$this->model->getOccupations($_GET["maintainerId"], $_GET["day"], $_GET["week"], $_GET["year"])->fetch_array(MYSQLI_NUM);
                $new_timeslots=$this->getNewOccupations();
                $verifies=$this->verifyTimeslots($new_timeslots,$activity_minutes);

                $new_timeslots=$verifies[0];
                $success=$verifies[1];
                if($success==1){
                    $timeslots=$this->incrementOccupations($base_timeslots,$new_timeslots);
                    /*echo "<br>";
                    print_r($base_timeslots);
                    echo "<br>";
                    print_r($new_timeslots);
                    echo "<br>";
                    print_r($timeslots);*/
                    $this->model->setMaintainerActivityId($_GET["maintainerId"],$_GET["activityId"]);
                    $this->model->updateMaintainerOccupation($_GET["maintainerId"], $_GET["week"], $_GET["year"], $_GET["day"], $timeslots);
                }
            }
            // Display the status of the timeslots allocation
            header("Location: http://localhost/smartmaintenance/planner/mainteners_timeslots?week={$_GET["week"]}&activityId={$_GET["activityId"]}&activityInfo={$_GET["activityInfo"]}&maintainerId={$_GET["maintainerId"]}&day={$_GET["day"]}&success=$success");
        }

        //View
        $this->view->setHeader($_GET["week"],$_GET["day"],$_GET["activityInfo"],$maintener_name);
        $this->view->setMaintenersTimeslots($maintener_name, $availableSkillsNumber, $requiredSkillsNumber, $ava_timeslots, $activity_minutes);
        $this->view->setDayAvailability($day_availab);
        $this->view->setWorkspaceNotes("Note");
        $this->view->setStatusMessage($_GET["success"]);
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

    public function findLastNonZeroTimeslots($timeslots){
        for($i=0;$i<count($timeslots);$i++){
            if($timeslots[$i] != 0)
                $last_index=$i;
        }
        return $last_index;
    }

    public function getNewOccupations(){
        //Increment occupation timeslots by timeslots allocation

        $timeslots=array();
        $timeslots[0]=(isset($_GET["timeslot1"])) ? $_GET["timeslot1"] : 0;
        $timeslots[1]=(isset($_GET["timeslot2"])) ? $_GET["timeslot2"] : 0;
        $timeslots[2]=(isset($_GET["timeslot3"])) ? $_GET["timeslot3"] : 0;
        $timeslots[3]=(isset($_GET["timeslot4"])) ? $_GET["timeslot4"] : 0;
        $timeslots[4]=(isset($_GET["timeslot5"])) ? $_GET["timeslot5"] : 0;
        $timeslots[5]=(isset($_GET["timeslot6"])) ? $_GET["timeslot6"] : 0;
        $timeslots[6]=(isset($_GET["timeslot7"])) ? $_GET["timeslot7"] : 0;
/*
        if(isset($_GET["timeslot1"]))
        $timeslots[0] += $_GET["timeslot1"];
    
    if(isset($_GET["timeslot2"]))
        $timeslots[1] += $_GET["timeslot2"];

    if(isset($_GET["timeslot3"]))
        $timeslots[2] += $_GET["timeslot3"];

    if(isset($_GET["timeslot4"]))
        $timeslots[3] += $_GET["timeslot4"];

    if(isset($_GET["timeslot5"]))
        $timeslots[4] += $_GET["timeslot5"];

    if(isset($_GET["timeslot6"]))
        $timeslots[5] += $_GET["timeslot6"];

    if(isset($_GET["timeslot7"]))
        $timeslots[6] += $_GET["timeslot7"];*/

        return $timeslots;
    }

    public function incrementOccupations($base_occupations, $new_occupations){
        for ($i=0; $i<count($new_occupations); $i++){
            $base_occupations[$i] += $new_occupations[$i];
        }
        return $base_occupations;
    }

    public function verifyTimeslots($timeslots,$requiredTime){
        $availab=0;
        $length=count($timeslots);
        for($i=0;$i<$length;$i++){
            $availab += $timeslots[$i];
        }

        $delta=$availab-$requiredTime;

        if($delta >= 0 && $delta < 60){
            $surplus=$delta;
            $last_index=$this->findLastNonZeroTimeslots($timeslots);
            $timeslots[$last_index] -= $surplus; //Delete the surplus for best time allocation
            $success=1;
        }else if($delta < 0){
            $success=0;
        }else{
            $success=2;
        }

        return [$timeslots,$success]; //success is 0->error, 1->success, 2->warning
    }
}
