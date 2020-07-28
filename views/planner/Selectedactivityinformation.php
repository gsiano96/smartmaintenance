<?php
/**
 * Class ToDoActivities
 *
 * {ViewResponsability}
 *
 * @package controllers
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
 */
namespace views\planner;

use framework\View;

class Selectedactivityinformation extends View
{

    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "selected_activity_information";
        parent::__construct($tplName);
    }

    public function getCurrentWeek(): int
    {
        $date = date("W");

        $this->setVar("week", $date);

        return $date;

    }

    public function setActivityinfo($activity_info)
    {
        $this->setVar("activityInfo", $activity_info);
    }


     public function setActivityBlock(\mysqli_result $activity)
    {
        if ($activity->num_rows > 0) {

            $this->openBlock("Activity");
            while ($activi= $activity->fetch_object()) {
                $this->setVar("workspacenotes", $activi->wksnote);
                $this->setVar("interventiondescription", $activi->description);
                $this->parseCurrentBlock();
            }
            $this->setBlock();
        } else {
            $this->hide("Activity");
        }
    }
   /* public function setSkill(\mysqli_result $skills)
    {
        if ($skills->num_rows > 0) {

            $this->openBlock("Skill");
            while ($skill = $skills->fetch_object()) {
                $this->setVar("skillsneeded", $skill->name);
                $this->parseCurrentBlock();
            }
            $this->setBlock();
        } else {
            $this->hide("Skill");
        }
    }
   */
    public function setSkillsList(array $skills){
        $skills_string="";
        foreach($skills as $skill){
            $skills_string.="- $skill <br>";
        }
        $this->setVar("skillsneeded",$skills_string);
    }
    public function setActivityID (int $id){
        $this->setVar("activityId",$id);
    }
}
