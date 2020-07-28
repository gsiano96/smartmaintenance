<?php

/**
 * Class EwoTimeslots
 *
 * {ViewResponsability}
 *
 * @package controllers\planner
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
 */

namespace views\planner;

use framework\View;

class EwoTimeslots extends View
{

    /**
     * Object constructor.
     *
     * @param string|null $tplName The html template containing the static design.
     */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/planner/ewo_timeslots";
        parent::__construct($tplName);
    }

    public function setMaintenersTimeslots($maints, $skillsNumber, $requiredSkillsNumber, $ava_timeslots, $required_minutes)
    {
        $this->openBlock("MaintenersTimeslots");

        for ($i = 0; $i < count($maints); $i++) {
            $this->setVar("maintenerName", $maints[$i]["full_name"]);
            $this->setVar("skillsNumber", $skillsNumber[$i]);
            $this->setVar("requiredSkillsNumber", $requiredSkillsNumber);
            $this->setVar("bgColorSkill", $this->getStyleBySkill($skillsNumber[$i], $requiredSkillsNumber));

            for ($j = 0; $j < 7; $j++) {
                $this->setVar("maintTime$j", "maintTime$i$j"); //name-id-for
                $this->setVar("timeslot$j", $ava_timeslots[$i][$j]); //value
                $this->setVar("bgColorSlot$j", $this->getSlotCheckStyle($ava_timeslots[$i][$j], $required_minutes));
            }

            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    public function setHeaderAndHidden($week, $dayOfTheWeek, $maintenance_description, $maintenance_id, $activ_time)
    {
        $this->setVar("week", $week);
        switch ($dayOfTheWeek) {
            case 1:
                $dayString = "Monday";
                break;
            case 2:
                $dayString = "Tuesday";
                break;
            case 3:
                $dayString = "Wedsday";
                break;
            case 4:
                $dayString = "Thursday";
                break;
            case 5:
                $dayString = "Friday";
                break;
            case 6:
                $dayString = "Saturday";
                break;
            case 7:
                $dayString = "Sunday";
                break;
        }
        $this->setVar("dayString", $dayString);
        $this->setVar("day", $dayOfTheWeek);
        $this->setVar("activInfo", $maintenance_description);
        $this->setVar("activId", $maintenance_id);
        $this->setVar("activTime", $activ_time);
    }

    public function setWorspaceNotes($workspace_notes)
    {
        $this->setVar("workspaceNotes", $workspace_notes);
    }

    public function setSkillsNeeded($activ_skills)
    {
        $skills_list="";
        for($i=0;$i<count($activ_skills); $i++){
            $skills_list .= "- {$activ_skills[$i]['name']}\r\n";
        }
        $this->setVar("skillsList", $skills_list);
    }

    public function setStatusMessage($status)
    {
        if (!isset($status)) {
            $this->hide("onSubmit");
            return;
        }

        if ($status == 0) {
            $this->setVar("alertStyle", "alert-danger");
            $this->setVar("messageStatus", "Assignation is not completed; the available time is less than the required one");
        } else if ($status == 1) {
            $this->setVar("alertStyle", "alert-success");
            $this->setVar("messageStatus", "Assignation completed");
        } else if ($status == 2) {
            $this->setVar("alertStyle", "alert-warning");
            $this->setVar("messageStatus", "Assignation is not completed; consider to improve the time allocation to fit at the best the required time");
        } else {
            $this->setVar("alertStyle", "alert-danger");
            $this->setVar("messageStatus", "Assignation is not completed; the current activity id has already been assigned to one of the selected maintainers");
        }
    }

    public function getStyleBySkill(int $skillsNumber, int $requiredSkillsNumber): string
    {
        if ($skillsNumber == 0) {
            $skill_style = "red";
        } else if ($skillsNumber < $requiredSkillsNumber) {
            $skill_style = "yellow";
        } else {
            $skill_style = "green";
        }
        return $skill_style;
    }

    public function getSlotCheckStyle(int $timeslot_ava_minutes, int $required_minutes): string
    {
        if ($timeslot_ava_minutes == 0) {
            $check_style = "red";
        } else if ($timeslot_ava_minutes < $required_minutes) {
            $check_style = "yellow";
        } else {
            $check_style = "green";
        }
        return $check_style;
    }

    public function getStyleByDayAvailab($day_availab)
    {
        if ($day_availab == 1) {
            $style = "green";
        } else if ($day_availab < 1) {
            $style = "yellow";
        }
        return $style;
    }
}
