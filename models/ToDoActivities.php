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
namespace models;

//use models\beans\BeanPlannedProcedure;
use framework\Model;

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

    public function getActivities()
    {
        // Notice: we use PHP HereDoc to specify SQL string
        $this->sql = <<<SQL
        SELECT 
            activity_id as id,
            area,
            typology as type,
            estimated_intervetion_time_m as estimatedIntervetionTime  
        FROM
            planned_procedure
        ORDER BY
            activity_id;
SQL;
        $this->updateResultSet();
        // The mysqli_result set already has the format:
        // array( array('id'=>'','area'=>'','type'=>'','estimatedIntervetionTime' => '') )
        return $this->getResultSet(); //return iterator mysqli_result
    }
}
