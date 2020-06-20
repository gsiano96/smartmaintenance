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
    
}
