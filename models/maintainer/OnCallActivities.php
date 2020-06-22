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
    /*------------ INIZIO SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/
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

    public function getStatsById($Iden){
        $planned = $this->getPlannedById($Iden);
        foreach ($planned as $plan)
            $nplan = $plan["PlannedCount"];
        $unplanned = $this->getUnplannedById($Iden);
        foreach ($unplanned as $unplan)
            $nunplan = $unplan["UnplannedCount"];
        $extra = $this->getExtraById($Iden);
        foreach ($extra as $ext)
            $next = $ext["ExtraCount"];
        $stats = array($nplan, $nunplan, $next);
        return $stats;
    }

    public function getPlannedById($Iden){
        $this->sql = <<<SQL
        SELECT 
	        COUNT(id_activity) as PlannedCount
        FROM 
	        maintenance_procedure
        INNER JOIN 
	        employees_maintenance_procedures ON id_activity = employees_maintenance_procedures.id_maintenance_procedure
        WHERE 
	        procedure_class = 'planned procedure' AND employees_maintenance_procedures.id_employee = $Iden
SQL;
        $this->updateResultSet();
        $planned = $this->getResultSet();
        return $planned;
    }

    public function getUnplannedById($Iden){
        $this->sql = <<<SQL
        SELECT 
	        COUNT(id_activity) as UnplannedCount
        FROM 
	        maintenance_procedure
        INNER JOIN 
	        employees_maintenance_procedures ON id_activity = employees_maintenance_procedures.id_maintenance_procedure
        WHERE 
	        procedure_class = 'unplanned procedure (ewo)' AND employees_maintenance_procedures.id_employee = $Iden
SQL;
        $this->updateResultSet();
        $unplanned = $this->getResultSet();
        return $unplanned;
    }

    public function getExtraById($Iden){
        $this->sql = <<<SQL
        SELECT 
	        COUNT(id_activity) as ExtraCount
        FROM 
	        maintenance_procedure
        INNER JOIN 
	        employees_maintenance_procedures ON id_activity = employees_maintenance_procedures.id_maintenance_procedure
        WHERE 
	        procedure_class = 'extra' AND employees_maintenance_procedures.id_employee = $Iden
SQL;
        $this->updateResultSet();
        $extra = $this->getResultSet();
        return $extra;
    }
    /*------------ FINE SEZIONE DI GESTIONE DELLA NAVBAR -----------------*/

}
