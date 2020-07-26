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
class Selectedactivityinformation extends Model
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
    public function getWorkspacenote(int $id) : mysqli_result{
        $this->sql=<<<SQL
        SELECT
            workspace_notes as wksnote, activity_description as description
        FROM 
            maintenance_procedure 
        WHERE
            id_activity=$id
        ORDER BY
            id_activity;
SQL;
        $this->updateResultSet();
        return $this->getResultSet();

    }
    public function getSkillsneeded(int $id) : mysqli_result{
        $this->sql=<<<SQL
        SELECT 
            name as name 
       FROM 
            skill
            INNER JOIN skills_maintenance_procedures
            ON (skill.id_skill=skills_maintenance_procedures.id_skill)
        WHERE 
            id_maintenance_procedure= $id;
       
        
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
        
            

    }
}
