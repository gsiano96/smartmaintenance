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

    public function getNameById($Iden){
        $this->sql = <<<SQL
        SELECT 
	        first_name as Name,
            last_name as Surname
        FROM
            employee
        WHERE 
	        id_employee = $Iden
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function getScheduledActivitiesFromDb($IDUsr)
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
	        employees_maintenance_procedures.id_employee = $IDUsr AND procedure_class = "planned procedure"
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }
}
