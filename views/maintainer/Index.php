<?php
/**
 * Class Index
 *
 * {ViewResponsability}
 *
 * @package controllers\maintainer
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\maintainer;

use framework\View;

class Index extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/maintainer/index";
        parent::__construct($tplName);
    }

    public function setMaintainerNameRow($data){
        $this->openBlock("MaintainerName");
        foreach ($data as $dataname){
            $this->setVar("Maintainer", $dataname["Name"]." ".$dataname["Surname"]);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    public function setNavbarStats($stats, $iden){
        $this->openBlock("ScheduledActivitiesStats");
        $this->setVar("Statistic", $stats[0]);
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("CallActivitiesStats");
        $this->setVar("Statistic", $stats[1]);
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("ExtraActivitiesStats");
        $this->setVar("Statistic", $stats[2]);
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
     }
    
}