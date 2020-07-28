<?php
/**
 * Class EwoTimeslots
 *
 * {ModelResponsability}
 *
 * @package models\planner
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\planner;

use framework\Model;
use mysqli_result;

class EwoTimeslots extends Model
{
    const timeslotDurationMin=[60, 60, 60, 60, 60, 60 ,60];
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

    public function getMaintCodeByIndexRow($row_index){
        $len=$row_index+1;
    $this->sql=<<<SQL
        select id_user
        from user
        where id_access_level=50
        LIMIT $len OFFSET $row_index 
SQL;
        
        $this->updateResultSet();
        $sql_result=$this->getResultSet();

        $row=$sql_result->fetch_assoc();
        return $row;
    }

    public function getMaintainersNumber(){
        $this->sql=<<<SQL
        SELECT count(*) as counting
        FROM user
        WHERE id_access_level=50
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();
        
        $row=$sql_result->fetch_assoc();
        
        return $row['counting'];
    }

    public function getMaintenerList(){
        $this->sql=<<<SQL
        SELECT
            id_user, full_name
        FROM 
            user
        WHERE id_access_level=50
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();

        $i=0;
        while($row=$sql_result->fetch_assoc()){
            $rows[$i++]=$row;
        }

        return $rows; //(id_user, full_name) list
    }

    public function getMaintainerSkillsNumber($maintainer_id) : int{
        $this->sql=<<<SQL
        SELECT
            count(id_skill) as count
        FROM
            employees_skills
        WHERE
            id_employee=$maintainer_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();
        if($sql_result->num_rows == 0){
            return 0;
        }
        return $sql_result->fetch_assoc()["count"];
    }

    public function getMaintenerSkills($maintener_id) {
        $this->sql=<<<SQL
        SELECT id_skill
        FROM employees_skills
        WHERE id_employee = $maintener_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet(); //(id_skill)

        $i=0;
        while($row=$sql_result->fetch_assoc()){
            $rows[$i++]=$row;
        }

        return $rows; //(id_skill)
    }

    public function getMaintenanceProcedureSkills(int $maintenance_proc_id) {
        $this->sql=<<<SQL
        SELECT
            A.id_skill, B.name
        FROM 
            skills_maintenance_procedures AS A 
            INNER JOIN skill AS B
            ON (A.id_skill=B.id_skill)
        WHERE 
            id_maintenance_procedure=$maintenance_proc_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet(); 

        $i=0;
        while($row=$sql_result->fetch_assoc()){
            $rows[$i++]=$row;
        }

        return $rows; //(id_skill, name)
    }

    public function getMaintenenaceDurationById(int $maintenance_id) : int{
        $this->sql=<<<SQL
        SELECT estimated_intervetion_time FROM maintenance_procedure WHERE id_activity=$maintenance_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();
        $row=$sql_result->fetch_assoc();
        if(empty($row))
            return NULL;
        return $row["estimated_intervetion_time"];
    }

    public function getOccupations(string $maintener_id, int $day, int $week, int $year){
        $this->sql=<<<SQL
        SELECT
            timeslot1,timeslot2,timeslot3,timeslot4,timeslot5,timeslot6,timeslot7
        FROM 
            maintener_occupation
        WHERE
            maintener_id = $maintener_id AND day=$day AND week=$week AND year=$year
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();
        $row=$sql_result->fetch_array(MYSQLI_NUM);

        return $row;

    }

    public function getMinutesAvailabilities(string $maintener_id, int $day, int $week, int $year): array
    {
        $row = $this->getOccupations($maintener_id, $day, $week, $year);

        if (empty($row)) {
            for ($i = 0; $i < 7; $i++) {
                $availability[$i] = self::timeslotDurationMin[$i];
            }
        } else {
            for ($i = 0; $i < 7; $i++) {
                $availability[$i] = self::timeslotDurationMin[$i] - $row[$i];
            }
        }

        return $availability;
    }

    public function isEmptyMaintenerOccupation(int $maintener_id,int $week, int $year,int $day) : bool{
        $this->sql=<<<SQL
        SELECT maintener_id
        FROM maintener_occupation
        WHERE maintener_id=$maintener_id AND week=$week AND year=$year AND day=$day
SQL;
        $this->updateResultSet();
        $result=$this->getResultSet();
        print_r($result->fetch_assoc());
        return ($result->num_rows == 0) ? true : false;
    }

    public function isEmptyMaintainerActivityId($maintainerId,$activityId){
        $this->sql=<<<SQL
        select id_employee,id_maintenance_procedure
        from employees_maintenance_procedures
        where id_employee=$maintainerId AND id_maintenance_procedure=$activityId
SQL;
        $this->updateResultSet();
       
        if($this->getResultSet()->num_rows == 0){
            return true;
        }

        return false;
    }

    public function setMaintainerActivityId($maintainerId,$activityId){
        
        if(!$this->isEmptyMaintainerActivityId($maintainerId,$activityId))
            throw new Exception("Attempt to create duplicates on a primary key");

        $this->sql=<<<SQL
        insert into employees_maintenance_procedures 
        (id_employee, id_maintenance_procedure, state_maintainer, expected_date)
        values
        ($maintainerId, $activityId, "Sent", NOW())
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function setMaintainerOccupation(int $maintener_id,int $week, int $year,int $day,array $timeslots) : bool{
        if(count($timeslots) < 7){
            throw new Exception("Size of the timeslots array is less than 7");
        }
        foreach($timeslots as $timeslot){
            if($timeslot > self::timeslotDurationMin){
                return false;
            }
        }
        $this->sql=<<<SQL
        INSERT INTO maintener_occupation
        (maintener_id,week,year,day,timeslot1,timeslot2,timeslot3,timeslot4,timeslot5,timeslot6,timeslot7)
        VALUES
        ($maintener_id,$week,$year,$day,$timeslots[0],$timeslots[1],$timeslots[2],$timeslots[3],$timeslots[4],$timeslots[5],$timeslots[6])
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }

    public function updateMaintainerOccupation(int $maintener_id,int $week, int $year,int $day,array $timeslots) : bool{
        if(count($timeslots) < 7){
            throw new Exception("Size of the timeslots array is less than 7");
        }
        foreach($timeslots as $timeslot){
            if($timeslot > self::timeslotDurationMin){
                return false;
            }
        }
        $this->sql=<<<SQL
        UPDATE maintener_occupation
        SET
        timeslot1=$timeslots[0],timeslot2=$timeslots[1],timeslot3=$timeslots[2],timeslot4=$timeslots[3],timeslot5=$timeslots[4],timeslot6=$timeslots[5],timeslot7=$timeslots[6]
        WHERE
        maintener_id=$maintener_id AND week=$week AND year=$year AND day=$day
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }
}
