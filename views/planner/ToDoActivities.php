<?php
/**
 * Class ToDoActivities
 *
 * {ViewResponsability}
 *
 * @package controllers
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\planner;

use framework\View;

class ToDoActivities extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/to_do_activities";
        parent::__construct($tplName);
    }
    
    /**
    * Opens block NoActivities
    *
    */
    public function openBlockNoActivities()
    {
        $this->openBlock("NoActivities");
    }

    /**
    * Opens block Activities
    *
    */
    public function openBlockActivities()
    {
        $this->openBlock("Activities");
    }

    /**
    * Sets value for area inside the block Activities
    *
    * @param mixed $value
    */
    public function setBlockVarActivitiesarea($value)
    {
        $this->setVar("area",$value);
    }

    /**
    * Sets value for estimatedInterventionTime inside the block Activities
    *
    * @param mixed $value
    */
    public function setBlockVarActivitiesestimatedInterventionTime($value)
    {
        $this->setVar("estimatedInterventionTime",$value);
    }

    /**
    * Sets value for id inside the block Activities
    *
    * @param mixed $value
    */
    public function setBlockVarActivitiesid($value)
    {
        $this->setVar("id",$value);
    }

    /**
    * Sets value for type inside the block Activities
    *
    * @param mixed $value
    */
    public function setBlockVarActivitiestype($value)
    {
        $this->setVar("type",$value);
    }

    /**
     * Render Activities Block
     *
     * @param \mysqli_result $activities
     * @throws \framework\exceptions\BlockNotFoundException
     * @throws \framework\exceptions\NotInitializedViewException
     * @throws \framework\exceptions\VariableNotFoundException
     */
    public function setActivitiesBlock(\mysqli_result $activities)
    {
        if ($activities->num_rows > 0) {
            $this->hide("NoActivities");
            $this->openBlock("Activities");
            while ($activity = $activities->fetch_object()) {
                $this->setVar("id",$activity->id);
                $this->setVar("area",$activity->area);
                $this->setVar("areaName",$activity->areaName);
                $this->setVar("type",$activity->type);
                $this->setVar("estimatedInterventionTime",$activity->estimatedIntervetionTime);
                $this->setVar("activityId",$activity->id);
                $this->parseCurrentBlock();
            }
            $this->setBlock();
        } else {
            $this->hide("Activities");
        }
    }

    public function setHeader(int $week){
        $this->setVar("week",$week);
    }

}
