<?php
/**
 * Class ScheduledActivities
 *
 * {ModelResponsability}
 *
 * @package models\maintainer
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\maintainer;

use framework\Model;

class ScheduledActivities extends Model
{
    /**
    * Object constructor.
    *
    */
    public function __construct()
    {
        $this->connect(DBHOST,DBUSER,DBPASSWORD,"smartmaintenance");
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
    public function getScheduledActivitiesFromDb()
    {
        $this->sql = <<<SQL
        SELECT 
            activity_description as ActDescription,
            estimated_intervetion_time as ActEstimatedTime,
            interruptible as ActInterrupt
        FROM
            maintenance_procedure
        WHERE 
            procedure_class = 'planned procedure';
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }
}
