<?php
/**
 * Class MaintenersAvailability
 *
 * {ViewResponsability}
 *
 * @package controllers
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\planner;

use framework\View;

class MaintenersTimeslots extends View
{

    const timeslotDurationMin=[60, 30, 60, 60, 60, 60 ,60];

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/planner/mainteners_timeslots";
        parent::__construct($tplName);
    }

    public function setMaintenersTimeslots($maintener_name, $skillsNumber, $requiredSkillsNumber, $ava_timeslots, $required_minutes)
    {
            $this->openBlock("MaintenersTimeslots");
            $this->setVar("maintenerName", $maintener_name);
               
            $this->setVar("skillsNumber", $skillsNumber);
            $this->setVar("requiredSkillsNumber", $requiredSkillsNumber);
            $this->setVar("timeslot1", $ava_timeslots[0]);
            $this->setVar("timeslot2", $ava_timeslots[1]);
            $this->setVar("timeslot3", $ava_timeslots[2]);
            $this->setVar("timeslot4", $ava_timeslots[3]);
            $this->setVar("timeslot5", $ava_timeslots[4]);
            $this->setVar("timeslot6", $ava_timeslots[5]);
            $this->setVar("timeslot7", $ava_timeslots[6]);

            $this->setVar("bgColorSkill",$this->getStyleBySkill($skillsNumber,$requiredSkillsNumber));
            $this->setVar("bgColorSlot1",$this->getSlotCheckStyle($ava_timeslots[0],$required_minutes));
            $this->setVar("bgColorSlot2",$this->getSlotCheckStyle($ava_timeslots[1],$required_minutes));
            $this->setVar("bgColorSlot3",$this->getSlotCheckStyle($ava_timeslots[2],$required_minutes));
            $this->setVar("bgColorSlot4",$this->getSlotCheckStyle($ava_timeslots[3],$required_minutes));
            $this->setVar("bgColorSlot5",$this->getSlotCheckStyle($ava_timeslots[4],$required_minutes));
            $this->setVar("bgColorSlot6",$this->getSlotCheckStyle($ava_timeslots[5],$required_minutes));
            $this->setVar("bgColorSlot7",$this->getSlotCheckStyle($ava_timeslots[6],$required_minutes));

            $this->parseCurrentBlock();
            $this->setBlock();
    }

    public function getStyleBySkill(int $skillsNumber, int $requiredSkillsNumber) : string{
        if($skillsNumber == 0){
            $skill_style="red";
        }else if($skillsNumber < $requiredSkillsNumber){
            $skill_style="yellow";
        }else{
            $skill_style="green";
        }
        return $skill_style;
    }

    public function getSlotCheckStyle(int $timeslot_ava_minutes, int $required_minutes) : string{
        if($timeslot_ava_minutes == 0){
            $check_style="red";
        }else if($timeslot_ava_minutes < $required_minutes){
            $check_style="yellow";
        }else{
            $check_style="green";
        }
        return $check_style;
    }

    public function getStyleByDayAvailab($day_availab){
        if($day_availab == 1){
            $style="green";
        }else if($day_availab < 1){
            $style="yellow";
        }
        return $style;
    }

    public function setWorkspaceNotes(string $notes){
        $this->setVar("workspaceNotes",$notes);
    }

    public function setDayAvailability($day_ava){
        $this->setVar("dayAvailability",$day_ava);
        $this->setVar("bgcolorDayAvailability",$this->getStyleByDayAvailab($day_ava));
    }

    public function setHeader($week,$dayOfTheWeek,$maintenance_description,$mantainer_name){
        $this->setVar("week",$week);
        $this->setVar("maintenanceDescription",$maintenance_description);
        switch($dayOfTheWeek){
            case 1:
                $dayString="Monday";
                break;
            case 2:
                $dayString="Tuesday";
                break;
            case 3: 
                $dayString="Wedsday";
                break;
            case 4: 
                $dayString="Thursday";
                break;
            case 5: 
                $dayString="Friday";
                break;
            case 6: 
                $dayString="Saturday";
                break;
            case 7:
                $dayString="Sunday";
                break;
        }
        $this->setVar("dayString",$dayString);
        $this->setVar("dayNumber",$dayOfTheWeek);
        $this->setVar("mantainerName",$mantainer_name);
    }

    public function setNavbar($planner_name){
        $this->setVar("planner",$planner_name);
        
    }


    
}
