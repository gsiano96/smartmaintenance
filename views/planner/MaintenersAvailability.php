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

class MaintenersAvailability extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/planner/mainteners_availability";
        parent::__construct($tplName);
    }

    public function setMaintenersAvailability($mainteners, $skillsNumber, $requiredSkillsNumber, $availability)
    {
        if (!empty($mainteners)) {
            $this->hide("NoMainteners");
            $this->openBlock("MaintenersAvailab");
            $i = 0;
            foreach ($mainteners as $maintener) { //for each available maintener
                $this->setVar("maintenerName", $maintener["full_name"]);
                $this->setVar("i", $i);
                $this->setVar("skillsNumber", $skillsNumber[$i]);
                $this->setVar("requiredSkillsNumber", $requiredSkillsNumber);
                $this->setVar("availabilityMon", $availability[$i][0]);
                $this->setVar("availabilityTue", $availability[$i][1]);
                $this->setVar("availabilityWed", $availability[$i][2]);
                $this->setVar("availabilityThu", $availability[$i][3]);
                $this->setVar("availabilityFri", $availability[$i][4]);
                $this->setVar("availabilitySat", $availability[$i][5]);
                $this->setVar("availabilitySun", $availability[$i][6]);
                $this->parseCurrentBlock();
                $i++;
            }
            $this->setBlock();
        } else {
            $this->hide("MaintenersAvailab");
        }
    }
    
}
