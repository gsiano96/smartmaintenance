<?php

/**
 * Class EwoTimeslots
 *
 * {ControllerResponsability}
 *
 * @package controllers\planner
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
 */

namespace controllers\planner;

use framework\Controller;
use framework\Model;
use framework\View;
use models\planner\EwoTimeslots as EwoTimeslotsModel;
use views\planner\EwoTimeslots as EwoTimeslotsView;

use Exception;

class EwoTimeslots extends Controller
{
    protected $view;
    protected $model;

    /**
     * Object constructor.
     *
     * @param View $view
     * @param Model $mode
     */
    public function __construct(View $view = null, Model $model = null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view, $this->model);
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
        $this->user = $this->restrictToAuthentication(null, "planner/ewo_compilation");
        $usrIden = $this->user->getId();

        if(isset($_GET["logout"])){
            $this->user->logout();
            header("Location: ewo_compilation");
        }

       // $_GET["activInfo"] = "Fisciano Molding";
       // $_GET["week"] = 23;
       // $_GET["day"] = 2;
        $_GET["year"] = 2020;
        //$_GET["activId"] = 2;


        $activ_time = $this->model->getMaintenenaceDurationById($_GET["activId"]);
        $activ_skills = $this->model->getMaintenanceProcedureSkills($_GET["activId"]); //list as (id_skill,name)
        if (empty($activ_skills)){
            $activ_skills_number=0;
        }else {
            $activ_skills_number = count($activ_skills);
        }

        $maints = $this->model->getMaintenerList(); //matrix

        for ($i = 0; $i < count($maints); $i++) {
            $skillsNumber[$i] = $this->model->getMaintainerSkillsNumber($maints[$i]["id_user"]);
            $skills[$i] = $this->model->getMaintenerSkills($maints[$i]["id_user"]);
            $ava_timeslots[$i] = $this->model->getMinutesAvailabilities($maints[$i]["id_user"], $_GET["day"],  $_GET["week"], $_GET["year"]);
            $ava_skills[$i] = $this->getMaintSkillsNumberOnRequiredSkill($skills[$i], $activ_skills);
        }

        

        //Only on submit
        if (isset($_GET["submit"])) {
            $maintTime = $this->getSubmitParamaters();
            print_r($maintTime);
            $total = $this->getTotalMinutes($maintTime);
            print_r($total);
            if ($total < $activ_time) {
                $status = 0; //Error: time requested is not sufficient
                //header("Location: ");
            } else if (($total - $activ_time) >= 60) {
                $status = 2; //Warning: consider to improve allocation
                //header("Location:");
            } else {
                $maintTime = $this->optimizeTimesAllocation($maintTime, $total, $activ_time);
                $status = 1; //Success
            }

            //On previous success
            if ($status == 1) {
                for ($i = 0; $i < count($maintTime); $i++) {
                    if(!$this->isMaintainerSelected($maintTime[$i])){
                        continue;
                    }
                    $maint_id = $this->model->getMaintCodeByIndexRow($i)["id_user"];
                    if (!$this->model->isEmptyMaintainerActivityId($maint_id, $_GET["activId"])) {
                        $status = 3; //Error: One of the maintainer has already been assigned to this activity
                        break;
                    } else {
                        //On first time allocation for that maintainer
                        if ($this->model->isEmptyMaintenerOccupation($maint_id, $_GET["week"], $_GET["year"], $_GET["day"])) {
                            $status = $this->model->setMaintainerOccupation($maint_id, $_GET["week"], $_GET["year"], $_GET["day"], $maintTime[$i]);
                        } else { //On the successive ones
                            $prev_times = $this->model->getOccupations($maint_id,  $_GET["day"], $_GET["week"], $_GET["year"]);
                            for ($j = 0; $j < 7; $j++) {
                                $new_times[$j] = $prev_times[$j] + $maintTime[$i][$j];
                            }
                            $status = $this->model->updateMaintainerOccupation($maint_id, $_GET["week"], $_GET["year"], $_GET["day"], $new_times);
                        }
                        //Assign the current activity id to this maintainer
                        $this->model->setMaintainerActivityId($maint_id,$_GET["activId"]);
                    }
                }
            }
            //Redirect to same page to show error if there are any.
            header("Location: http://localhost/smartmaintenance/planner/ewo_timeslots?day={$_GET['day']}&week={$_GET['week']}&year=2020&activId={$_GET['activId']}&activInfo={$_GET['activInfo']}&status=$status");
        }

        //View
        $this->view->setHeaderAndHidden($_GET["week"], $_GET["day"], $_GET["activInfo"], $_GET["activId"], $activ_time);
        $this->view->setMaintenersTimeslots($maints, $skillsNumber, $activ_skills_number, $ava_timeslots, $activ_time);
        $this->view->setWorspaceNotes("Note");
        $this->view->setSkillsNeeded($activ_skills);
        $this->view->setStatusMessage($_GET["status"]);

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
     * Inizialize the View by loading static design of /planner/ewo_timeslots.html.tpl
     * managed by views\planner\EwoTimeslots class
     *
     */
    public function getView()
    {
        $view = new EwoTimeslotsView("/planner/ewo_timeslots");
        return $view;
    }

    /**
     * Inizialize the Model by loading models\planner\EwoTimeslots class
     *
     */
    public function getModel()
    {
        $model = new EwoTimeslotsModel();
        return $model;
    }

    public function getSubmitParamaters()
    {
        $maints_number=$this->model->getMaintainersNumber();
        
        for ($i = 0; $i < $maints_number; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if (isset($_GET["maintTime$i$j"])) {
                    $maintTime[$i][$j] = $_GET["maintTime$i$j"];
                } else {
                    $maintTime[$i][$j] = 0;
                }
            }
        }
        return $maintTime;
    }

    public function isMaintainerSelected($maint)
    {
        for ($j = 0; $j < 7; $j++) {
            if ($maint[$j] != 0) {
                return true;
            }
        }
        return false;
    }

    public function getTotalMinutes($maintTime)
    {
        $total=0;
        for ($i = 0; $i < count($maintTime); $i++) {
            for ($j = 0; $j < 7; $j++) {
                $total += $maintTime[$i][$j];
            }
        }
        return $total;
    }

    

    public function getMaintSkillsNumberOnRequiredSkill($maint_skills, $activ_skills)
    {


        $counter = 0;
        foreach ($activ_skills as $req_skill) {
            foreach ($maint_skills as $ava_skill) {
                if ($ava_skill == $req_skill) {
                    $counter++;
                }
            }
        }
        return $counter;
    }

    public function findLastNonZeroCellOfAMatrix($matrix)
    {
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($matrix[$i][$j] != 0) {
                    $last_i = $i;
                    $last_j = $j;
                }
            }
        }
        if (isset($last_i) && isset($last_j)) {
            return [$last_i, $last_j];
        }
        //Zero matrix
        throw new Exception("Matrix contains all zero elements");
    }

    public function optimizeTimesAllocation($maintTime, $totalMinutes, $requiredTime)
    {
        $indexes = $this->findLastNonZeroCellOfAMatrix($maintTime);
        $delta = $totalMinutes - $requiredTime;
        if ($delta >= 0) { //surplus
            $maintTime[$indexes[0]][$indexes[1]] -= $delta; //delete the surplus
        }
        return $maintTime;
    }
}
