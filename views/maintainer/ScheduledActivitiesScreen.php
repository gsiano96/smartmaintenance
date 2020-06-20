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
    public function setNoteActivityScreenRow($notes){
        $this->openBlock("ActivityNotesParameter");
        foreach ($notes as $note){
            $this->setVar("ActivityNotes", $note["ActNote"]);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    public function setManageButtonActivityScreenRow($inter){
        foreach ($inter as $int)
            $tmp = $int["ActInter"];
        if($tmp == 0)
            $value = "disabled";
        else
            $value = " ";
        $this->openBlock("ManageButton");
        $this->setVar("Inter", $value);
        $this->parseCurrentBlock();
        $this->setBlock();
    }
}
