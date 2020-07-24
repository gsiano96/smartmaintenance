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


class MaintenersTimeslots extends Model
{

    const dayTimeSlots=[['8:00:00','9:00:00'], ['9:30:00','10:00:00'], ['10:00:00', '11:00:00'], ['11:00:00','12:00:00'], ['14:00:00', '15:00:00'], ['15:00:00', '16:00:00'], ['16:00:00', '17:00:00']];
    const timeslotDurationMin=[60, 30, 60, 60, 60, 60 ,60];

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

    protected function getDatePeriod($str_start_date, $str_end_date, $str_date_interval){
        $startDate = new DateTime($str_start_date); //yyyy-mm-dd
        $endDate = new DateTime($str_end_date); //yyyy-mm-dd

        $interval = DateInterval::createFromDateString($str_date_interval); // ex. 1 day
        $period = new DatePeriod($startDate, $interval, $endDate);
        return $period;
    }

    
}
