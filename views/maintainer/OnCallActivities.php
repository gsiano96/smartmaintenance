<?php
/**
 * Class OnCallActivities
 *
 * {ViewResponsability}
 *
 * @package controllers\maintainer
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\maintainer;

use framework\View;

class OnCallActivities extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/maintainer/on_call_activities";
        parent::__construct($tplName);
    }

    public function setOnCallActivityRow($scheduledActivities){
        $this->openBlock("OnCallActivitiesRow");
        foreach ($scheduledActivities as $activity){
            $this->setVar("IDData", $activity["ActID"]);
            $this->setVar("DescriptionData", $activity["ActDescription"]);
            $this->setVar("TimeData", $activity["ActEstimatedTime"]);
            if($activity["ActInterrupt"]==1)
                $trad="Yes";
            else
                $trad="No";
            $this->setVar("InterrumptibleData", $trad);
            $this->parseCurrentBlock();
        }
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
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("ExtraActivitiesStats");
        $this->setVar("Statistic", $stats[2]);
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
        $this->openBlock("HomeReferenceBlock");
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
    }
    /*------------ FINE SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
    
}
