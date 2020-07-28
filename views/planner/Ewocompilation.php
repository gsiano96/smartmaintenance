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

class Ewocompilation extends View
{

    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "ewo_compilation";
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
    public function setDay($daynam,$daynum)
    {
        $this->setVar("day", $daynam);
        $this->setVar("numday", $daynum);
    }
    public function setWorkspace($wks)
    {
        $this->setVar("Workspacenotes", $wks);
    }
    public function setSkill(array $skills)
    {
    $this->openBlock("Skill");
        foreach ($skills as $skill) {
            $this->setVar("Skills", $skill);
            $this->parseCurrentBlock();
            }
       $this->setBlock();
    }
}
