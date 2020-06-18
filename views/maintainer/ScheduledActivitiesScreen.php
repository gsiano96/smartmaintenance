<?php
/**
 * Class ScheduledActivitiesScreen
 *
 * {ViewResponsability}
 *
 * @package controllers\maintainer
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\maintainer;

use framework\View;

class ScheduledActivitiesScreen extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/maintainer/scheduled_activities_screen";
        parent::__construct($tplName);
    }

    public function setScheduledActivityScreenRow($scheduledActivities){
        $this->openBlock("ActivityParametersRow");
        foreach ($scheduledActivities as $activity){
            $this->setVar("DescriptionData", $activity["ActDescription"]);
            $this->setVar("TimeData", $activity["ActEstimatedTime"]);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }
    public function setMaterialActivityScreenRow($materials){
        $this->openBlock("ActivityMaterialParameter");
        foreach ($materials as $material){
            $this->setVar("ActivityMaterials", $material["MatName"]);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }
}
