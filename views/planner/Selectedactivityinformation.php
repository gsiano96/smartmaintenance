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

class Selectedactivityinformation extends View
{

    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "selected_activity_information";
        parent::__construct($tplName);
    }

    public function getCurrentWeek(){
        $date = date("W");

        $this->setVar("week",$date);

    }


}
