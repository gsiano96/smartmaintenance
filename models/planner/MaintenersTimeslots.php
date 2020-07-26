<?php
/**
 * Class MaintenersAvailability
 *
 * {ModelResponsability}
 *
 * @package models
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\planner;

use framework\Model;
use \DateInterval;
use \DateTime;
use \DatePeriod;
use \mysqli_result;
use \FFI\Exception;


class MaintenersTimeslots extends Model
{

    const dayTimeSlots=[['8:00:00','9:00:00'], ['9:00:00','10:00:00'], ['10:00:00', '11:00:00'], ['11:00:00','12:00:00'], ['14:00:00', '15:00:00'], ['15:00:00', '16:00:00'], ['16:00:00', '17:00:00']];
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

    public function getStartAndEndDate($week, $year) : array {
        $datetime = new DateTime();
        $datetime->setISODate($year, $week);
        $dates['week_start'] = $datetime->format('Y-m-d');
        $datetime->modify('+6 days');
        $dates['week_end'] = $datetime->format('Y-m-d');
        return $dates;
    }

    public function getTotalMinutes($dayTimeSlot) : int {
        $string_datetime_A="2007-09-01 {$dayTimeSlot[0]}";
        $string_datetime_B="2007-09-01 {$dayTimeSlot[1]}";
        $start_date = new DateTime($string_datetime_A);
        $since_start = $start_date->diff(new DateTime($string_datetime_B));
        /*
        echo $since_start->days.' days total<br>';
        echo $since_start->y.' years<br>';
        echo $since_start->m.' months<br>';
        echo $since_start->d.' days<br>';
        echo $since_start->h.' hours<br>';
        echo $since_start->i.' minutes<br>';
        echo $since_start->s.' seconds<br>';*/

        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;

        return $minutes;
    }

    public function getTotalMinutesOfTheDay(){
        $minutes=0;
        foreach (self::dayTimeSlots as $timeSlot) {
            $minutes += $this->getTotalMinutes($timeSlot);
        }
        return $minutes;
    }

    public function getMaintenerList(): mysqli_result{
        $this->sql=<<<SQL
        SELECT
            id_user, full_name
        FROM 
            user
        WHERE id_access_level=50
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();

        return $sql_result; //(id_user, full_name) list
    }

    public function getMaintenerFullNameById($maintener_id) : string{
        $this->sql=<<<SQL
        SELECT full_name
        FROM user
        WHERE id_user=$maintener_id;
SQL;
        $this->updateResultSet();
        return $this->getResultSet()->fetch_assoc()["full_name"];
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

    public function getOccupations(string $maintener_id, int $day, int $week, int $year) : mysqli_result{
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

        return $sql_result;

    }

    public function getMinutesAvailabilities(string $maintener_id, int $day, int $week, int $year): array
    {
        $sql_result = $this->getOccupations($maintener_id, $day, $week, $year);
        $row = $sql_result->fetch_assoc();

        if (empty($row)) {
            for ($i = 0; $i < 7; $i++) {
                $availability[$i] = self::timeslotDurationMin[$i];
            }
        } else {
            $availability[0] = self::timeslotDurationMin[0] - $row["timeslot1"];
            $availability[1] = self::timeslotDurationMin[1] - $row["timeslot2"];
            $availability[2] = self::timeslotDurationMin[2] - $row["timeslot3"];
            $availability[3] = self::timeslotDurationMin[3] - $row["timeslot4"];
            $availability[4] = self::timeslotDurationMin[4] - $row["timeslot5"];
            $availability[5] = self::timeslotDurationMin[5] - $row["timeslot6"];
            $availability[6] = self::timeslotDurationMin[6] - $row["timeslot7"];
        }

        return $availability;
    }

    public function getMaintenenaceDescriptionById(int $maintenance_id) : string{
        $this->sql=<<<SQL
        SELECT activity_description FROM maintenance_procedure WHERE id_activity=$maintenance_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet();
        $row=$sql_result->fetch_assoc();
        if(empty($row))
            return "";
        return $row["activity_description"];
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

    public function getMaintenanceProcedureSkills(int $maintenance_proc_id) : mysqli_result{
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
        $sql_result=$this->getResultSet(); //(id_skill, name)
        return $sql_result;
    }

    public function getMaintenerSkills($maintener_id) : mysqli_result{
        $this->sql=<<<SQL
        SELECT id_skill
        FROM employees_skills
        WHERE id_employee = $maintener_id
SQL;
        $this->updateResultSet();
        $sql_result=$this->getResultSet(); //(id_skill)

        return $sql_result;
    }

    public function getDayAvailability(int $maintener_id, int $week, int $year, int $day) : float{
        $this->sql=<<<SQL
        SELECT
            timeslot1,timeslot2,timeslot3,timeslot4,timeslot5,timeslot6,timeslot7
        FROM 
            maintener_occupation
        WHERE maintener_id=$maintener_id AND week=$week AND year=$year AND day=$day  
SQL;
        $this->updateResultSet();
        
        $row = $this->getResultSet()->fetch_assoc(); //one result at maximum

        if(empty($row)){
            return 1;
        }

        $sum=0;
        foreach($row as $timeslot){
            $sum += $timeslot;
        }
        
        return round(1-$sum/$this->getTotalMinutesTimelots(),2);
    }

    public function getAvailabilityAllDays(int $maintener_id, int $week, int $year) : array{
        for($day=1;$day<=7;$day++){ //From Mon to Sun
            $availability[$day-1]=$this->getDayAvailability($maintener_id, $week, $year,$day);
        }
        return $availability; //[coeff1,coeff2,...,coeff7]
    }

    public function getTotalMinutesTimelots(){
        $tot=0;
        foreach(self::timeslotDurationMin as $timeslot){
            $tot += $timeslot;
        }
        return $tot;
    }

    public function getMaintenerTimeslot(int $maintainer_id, int $week, int $year, int $day, int $timeslot_string){
        $this->sql=<<<SQL
        SELECT $timeslot_string
        FROM maintener_occupation
        WHERE maintener_id=$maintainer_id AND week=$week AND year=$year AND day=$day
SQL;
        $this->updateResultSet();
        $sql=$this->getResultSet();
        if($sql->num_rows == 0) return NULL;
        return $sql->fetch_assoc()[$timeslot_string];
    }

    protected function getDatePeriod($str_start_date, $str_end_date, $str_date_interval){
        $startDate = new DateTime($str_start_date); //yyyy-mm-dd
        $endDate = new DateTime($str_end_date); //yyyy-mm-dd

        $interval = DateInterval::createFromDateString($str_date_interval); // ex. 1 day
        $period = new DatePeriod($startDate, $interval, $endDate);
        return $period;
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
    
}
