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
            $this->setVar("DescriptionData", $activity["ActDescription"]);
            $this->setVar("TimeData", $activity["ActEstimatedTime"]);
            $this->setVar("InterrumptibleData", $activity["ActInterrupt"]);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }


    
}
