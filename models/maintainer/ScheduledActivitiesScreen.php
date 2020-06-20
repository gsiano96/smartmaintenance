<?php
/**
 * Class ScheduledActivitiesScreen
 *
 * {ModelResponsability}
 *
 * @package models\maintainer
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\maintainer;

use framework\Model;

class ScheduledActivitiesScreen extends Model
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

    public function getScheduledActivityFromDb($IDAct)
    {
        $this->sql = <<<SQL
        SELECT 
            id_activity as ActID,
            activity_description as ActDescription,
            estimated_intervetion_time as ActEstimatedTime,
            interruptible as ActInterrupt
        FROM
            maintenance_procedure
        WHERE 
            procedure_class = 'planned procedure'
            AND id_activity = $IDAct;
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function getMaterialsForActivityFromDb($IDAct)
    {
        $this->sql = <<<SQL
        SELECT
            material.name as MatName, 
            material.id_material as MatID, 
            materials_maintenace_procedures.id_maintenance_procedure,
            maintenance_procedure.id_activity
        FROM
            material
        INNER JOIN 
           materials_maintenace_procedures ON material.id_material = materials_maintenace_procedures.id_material
        INNER JOIN maintenance_procedure ON id_maintenance_procedure = id_activity
        WHERE
            id_activity=$IDAct;
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function getNoteForActivityFromDb($IDAct)
    {
        $this->sql = <<<SQL
        SELECT
	        employees_maintenance_procedures.note as ActNote 
        FROM
	        employees_maintenance_procedures
        INNER JOIN 
	        maintenance_procedure ON employees_maintenance_procedures.id_maintenance_procedure = maintenance_procedure.id_activity
        WHERE
	        id_activity = $IDAct;
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function getInterForActivityFromDb($IDAct){
        $this->sql = <<<SQL
        SELECT
	        interruptible as ActInter 
        FROM
	        maintenance_procedure
        WHERE
	        id_activity = $IDAct;
SQL;

        $this->updateResultSet();
        return $this->getResultSet();
    }

}
