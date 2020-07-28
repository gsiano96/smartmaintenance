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

class Ewocompilation extends Model
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
    public function getSkill():mysqli_result{
        $this->sql=<<<SQL
        SELECT 
           name as name 
        FROM 
           skill ;
       
       
SQL;
        $this->updateResultSet();
        return $this->getResultSet();

    }
    public function insertEWO($estimated,$descri,$week,$tipo,$procedure,$workspa){
        $this->sql=<<<SQL
        INSERT INTO maintenance_procedure (estimated_intervetion_time,activity_description,week,tipology,procedure_class,workspace_notes,interruptible,machine,area,planner,state_area)
        VALUES ('$estimated','$descri','$week','$tipo','$procedure','$workspa','0','machine 8','20','8','Sent');
    
SQL;
        $this->updateResultSet();
        return $this->getResultSet();

    }
    public function getIdactivity():mysqli_result
    {
        $this->sql=<<<SQL
        SELECT id_activity as id FROM maintenance_procedure ORDER BY id_activity DESC LIMIT 1
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }
}
