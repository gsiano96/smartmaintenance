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

                $this->setVar("btnSkill",$this->getBtnStyleBySkill($skillsNumber[$i],$requiredSkillsNumber));
                $this->setVar("btnMon",$this->getDayBtnStyle($availability[$i][0]));
                $this->setVar("btnTue",$this->getDayBtnStyle($availability[$i][1]));
                $this->setVar("btnWed",$this->getDayBtnStyle($availability[$i][2]));
                $this->setVar("btnThu",$this->getDayBtnStyle($availability[$i][3]));
                $this->setVar("btnFri",$this->getDayBtnStyle($availability[$i][4]));
                $this->setVar("btnSat",$this->getDayBtnStyle($availability[$i][5]));
                $this->setVar("btnSun",$this->getDayBtnStyle($availability[$i][6]));

                $this->parseCurrentBlock();
                $i++;
            }
            $this->setBlock();
        } else {
            $this->hide("MaintenersAvailab");
        }
    }

    public function getBtnStyleBySkill(int $skillsNumber, int $requiredSkillsNumber) : string{
        if($skillsNumber == 0){
            $btn_style="btn-danger";
        }else if($skillsNumber < $requiredSkillsNumber){
            $btn_style="btn-warning";
        }else{
            $btn_style="btn-success";
        }
        return $btn_style;
    }

    public function getDayBtnStyle(float $day_availability) : string{
        if($day_availability <= 0.1){
            $btn_style="btn-danger";
        }else if($day_availability > 0.1 && $day_availability <= 0.8){
            $btn_style="btn-warning";
        }else{
            $btn_style="btn-success";
        }
        return $btn_style;
    }

    public function setSkillsList(array $skills){
        $skills_string="";
        foreach($skills as $skill){
            $skills_string.="- $skill \r\n";
        }
        $this->setVar("maintSkillsList",$skills_string);
    }
    
}
