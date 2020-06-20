<?php
/**
 * Class OnCallActivities
 *
 * {ModelResponsability}
 *
 * @package models\maintainer
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\maintainer;

use framework\Model;

class OnCallActivities extends Model
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

    public function getOnCallActivitiesFromDb($IDUsr)
    {
        $this->sql = <<<SQL
        SELECT 
	        id_activity as ActID,
            activity_description as ActDescription,
            estimated_intervetion_time as ActEstimatedTime,
            interruptible as ActInterrupt
        FROM
            maintenance_procedure
        INNER JOIN employees_maintenance_procedures ON id_activity = employees_maintenance_procedures.id_maintenance_procedure
        WHERE 
	        employees_maintenance_procedures.id_employee = $IDUsr AND procedure_class = "unplanned procedure (ewo)"
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }
}
