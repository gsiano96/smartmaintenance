<?php
/**
 * Class ToDoActivities
 *
 * {ModelResponsability}
 *
 * @package models
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\planner;

//use models\beans\BeanPlannedProcedure;
use framework\Model;
use mysqli_result;

class ToDoActivities extends /*BeanPlannedProcedure*/ Model
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
/*
    public function getActivities()
    {
        // Notice: we use PHP HereDoc to specify SQL string
        $this->sql = <<<SQL
        SELECT 
            id_activity as id,
            area,
            tipology as type,
            estimated_intervetion_time as estimatedIntervetionTime  
        FROM
            maintenance_procedure
        ORDER BY
            id_activity;
SQL;
        $this->updateResultSet();
        // The mysqli_result set already has the format:
        // array( array('id'=>'','area'=>'','type'=>'','estimatedIntervetionTime' => '') )
        return $this->getResultSet(); //return iterator mysqli_result
    }
*/
    public function getActivities(int $week) : mysqli_result{
        $this->sql=<<<SQL
        SELECT
            id_activity as id, area, name as areaName, tipology as type, estimated_intervetion_time as estimatedIntervetionTime
        FROM 
            maintenance_procedure 
            INNER JOIN entity 
            ON (area=id_entity)
        WHERE
            week=$week and procedure_class='planned procedure'
        ORDER BY
            id_activity;
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }
}
