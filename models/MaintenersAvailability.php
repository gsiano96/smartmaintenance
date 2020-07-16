<?php
/**
 * Class MaintenersAvailability
 *
 * {ModelResponsability}
 *
 * @package models
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models;

use framework\Model;

class MaintenersAvailability extends Model
{
    /**
    * Object constructor.
    *
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|array|null $parameters Additional parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {

    }

    protected function getStartAndEndDate($week, $year) {
        $datetime = new DateTime();
        $datetime->setISODate($year, $week);
        $dates['week_start'] = $datetime->format('Y-m-d');
        $datetime->modify('+6 days');
        $dates['week_end'] = $datetime->format('Y-m-d');
        return $dates;
    }

    protected function getDatePeriod($str_start_date, $str_end_date, $str_date_interval){
        $startDate = new DateTime($str_start_date); //yyyy-mm-dd
        $endDate = new DateTime($str_end_date); //yyyy-mm-dd

        $interval = DateInterval::createFromDateString($str_date_interval); // ex. 1 day
        $period = new DatePeriod($startDate, $interval, $endDate);
        return $period;
    }
/*
    public function getMaintenersByDayAvailability($day_number, $current_date){
        this->sql=<<<SQL
        SELECT 
SQL;

    }*/
}
