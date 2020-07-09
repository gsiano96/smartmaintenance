<?php
/**
 * Class ClosingEWO
 *
 * {ViewResponsability}
 *
 * @package controllers\maintainer
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\maintainer;

use framework\View;

class ClosingEWO extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/maintainer/closing_ewo";
        parent::__construct($tplName);
    }
    public function setClosingEWORow(){
        $this->openBlock("ClosingEWORow");
        $vuoto = " ";
        $this->setVar("DescriptionData", $vuoto);
        $this->setVar("TimeData", $vuoto);
        $this->setVar("InterrumptibleData", $vuoto);
        $this->parseCurrentBlock();
        $this->setBlock();
    }
    /*------------ INIZIO SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
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
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("OnCallActivitiesStats");
        $this->setVar("Statistic", $stats[1]);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("ExtraActivitiesStats");
        $this->setVar("Statistic", $stats[2]);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("HomeReferenceBlock");
        $this->parseCurrentBlock();
        $this->setBlock();

    }
    /*------------ FINE SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/

}
