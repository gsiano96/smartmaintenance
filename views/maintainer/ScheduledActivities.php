<?php
/**
 * Class ScheduledActivities
 *
 * {ViewResponsability}
 *
 * @package controllers\maintainer
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\maintainer;

use framework\View;

class ScheduledActivities extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/maintainer/scheduled_activities";
        parent::__construct($tplName);
    }

    public function setScheduledActivityRow($scheduledActivities){
        $this->openBlock("ScheduledActivitiesRow");
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
        $this->openBlock("HomeReferenceBlock");
        $this->setVar("IDUser", $iden);
        $this->parseCurrentBlock();
        $this->setBlock();
    }
/*------------ FINE SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
}
