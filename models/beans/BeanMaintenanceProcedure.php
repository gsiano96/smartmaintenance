<?php
/**
 * Class BeanMaintenanceProcedure
 * Bean class for object oriented management of the MySQL table maintenance_procedure
 *
 * Comment of the managed table maintenance_procedure: Not specified.
 *
 * Responsibility:
 *
 *  - provides instance constructors for both managing of a fetched table or for a new row
 *  - provides destructor to automatically close database connection
 *  - defines a set of attributes corresponding to the table fields
 *  - provides setter and getter methods for each attribute
 *  - provides OO methods for simplify DML select, insert, update and delete operations.
 *  - provides a facility for quickly updating a previously fetched row
 *  - provides useful methods to obtain table DDL and the last executed SQL statement
 *  - provides error handling of SQL statement
 *  - uses Camel/Pascal case naming convention for Attributes/Class used for mapping of Fields/Table
 *  - provides useful PHPDOC information about the table, fields, class, attributes and methods.
 *
 * @extends MySqlRecord
 * @implements Bean
 * @filesource BeanMaintenanceProcedure.php
 * @category MySql Database Bean Class
 * @package models/bean
 * @author Rosario Carvello <rosario.carvello@gmail.com>
 * @version GIT:v1.0.0
 * @note  This is an auto generated PHP class builded with MVCMySqlReflection, a small code generation engine extracted from the author's personal MVC Framework.
 * @copyright (c) 2016 Rosario Carvello <rosario.carvello@gmail.com> - All rights reserved. See License.txt file
 * @license BSD
 * @license https://opensource.org/licenses/BSD-3-Clause This software is distributed under BSD Public License.
 */
namespace models\beans;

use framework\MySqlRecord;
use framework\Bean;

class BeanMaintenanceProcedure extends MySqlRecord implements Bean
{
    /**
     * A control attribute for the update operation.
     * @note An instance fetched from db is allowed to run the update operation.
     *       A new instance (not fetched from db) is allowed only to run the insert operation but,
     *       after running insertion, the instance is automatically allowed to run update operation.
     * @var bool
     */
    private $allowUpdate = false;

    /**
     * Class attribute for mapping the primary key id_activity of table maintenance_procedure
     *
     * Comment for field id_activity: Not specified<br>
     * @var int $idActivity
     */
    private $idActivity;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field estimated_intervetion_time
     *
     * Comment for field estimated_intervetion_time: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $estimatedIntervetionTime
     */
    private $estimatedIntervetionTime;

    /**
     * Class attribute for mapping table field activity_description
     *
     * Comment for field activity_description: Not specified.<br>
     * Field information:
     *  - Data type: varchar(2048)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $activityDescription
     */
    private $activityDescription;

    /**
     * Class attribute for mapping table field interruptible
     *
     * Comment for field interruptible: Not specified.<br>
     * Field information:
     *  - Data type: tinyint(1)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $interruptible
     */
    private $interruptible;

    /**
     * Class attribute for mapping table field week
     *
     * Comment for field week: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $week
     */
    private $week;

    /**
     * Class attribute for mapping table field smp_file
     *
     * Comment for field smp_file: Not specified.<br>
     * Field information:
     *  - Data type: blob
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var null $smpFile
     */
    private $smpFile;

    /**
     * Class attribute for mapping table field tipology
     *
     * Comment for field tipology: Not specified.<br>
     * Field information:
     *  - Data type: enum('Mechanical','Electric','Hydraulic','Electronics')
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $tipology
     */
    private $tipology;

    /**
     * Class attribute for mapping table field machine
     *
     * Comment for field machine: Not specified.<br>
     * Field information:
     *  - Data type: varchar(128)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $machine
     */
    private $machine;

    /**
     * Class attribute for mapping table field procedure_class
     *
     * Comment for field procedure_class: Not specified.<br>
     * Field information:
     *  - Data type: enum('extra','planned procedure','unplanned procedure (ewo)','')
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $procedureClass
     */
    private $procedureClass;

    /**
     * Class attribute for mapping table field area
     *
     * Comment for field area: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $area
     */
    private $area;

    /**
     * Class attribute for mapping table field general_state
     *
     * Comment for field general_state: Not specified.<br>
     * Field information:
     *  - Data type: enum('Closed','In progress','Not started','')
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $generalState
     */
    private $generalState;

    /**
     * Class attribute for mapping table field cause
     *
     * Comment for field cause: Not specified.<br>
     * Field information:
     *  - Data type: enum('CR1','CR2','CR3','CR4','CR5','CR6')
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $cause
     */
    private $cause;

    /**
     * Class attribute for mapping table field planner
     *
     * Comment for field planner: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $planner
     */
    private $planner;

    /**
     * Class attribute for mapping table field state_area
     *
     * Comment for field state_area: Not specified.<br>
     * Field information:
     *  - Data type: enum('Received','Sent','Not Sent','')
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $stateArea
     */
    private $stateArea;

    /**
     * Class attribute for storing the SQL DDL of table maintenance_procedure
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBtYWludGVuYW5jZV9wcm9jZWR1cmVgICgKICBgaWRfYWN0aXZpdHlgIGludCBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwKICBgZXN0aW1hdGVkX2ludGVydmV0aW9uX3RpbWVgIGludCBOT1QgTlVMTCwKICBgYWN0aXZpdHlfZGVzY3JpcHRpb25gIHZhcmNoYXIoMjA0OCkgREVGQVVMVCBOVUxMLAogIGBpbnRlcnJ1cHRpYmxlYCB0aW55aW50KDEpIE5PVCBOVUxMLAogIGB3ZWVrYCBpbnQgTk9UIE5VTEwsCiAgYHNtcF9maWxlYCBibG9iLAogIGB0aXBvbG9neWAgZW51bSgnTWVjaGFuaWNhbCcsJ0VsZWN0cmljJywnSHlkcmF1bGljJywnRWxlY3Ryb25pY3MnKSBDSEFSQUNURVIgU0VUIHV0ZjggQ09MTEFURSB1dGY4X2dlbmVyYWxfY2kgTk9UIE5VTEwsCiAgYG1hY2hpbmVgIHZhcmNoYXIoMTI4KSBOT1QgTlVMTCwKICBgcHJvY2VkdXJlX2NsYXNzYCBlbnVtKCdleHRyYScsJ3BsYW5uZWQgcHJvY2VkdXJlJywndW5wbGFubmVkIHByb2NlZHVyZSAoZXdvKScsJycpIE5PVCBOVUxMLAogIGBhcmVhYCBpbnQgTk9UIE5VTEwsCiAgYGdlbmVyYWxfc3RhdGVgIGVudW0oJ0Nsb3NlZCcsJ0luIHByb2dyZXNzJywnTm90IHN0YXJ0ZWQnLCcnKSBDSEFSQUNURVIgU0VUIHV0ZjggQ09MTEFURSB1dGY4X2dlbmVyYWxfY2kgREVGQVVMVCBOVUxMLAogIGBjYXVzZWAgZW51bSgnQ1IxJywnQ1IyJywnQ1IzJywnQ1I0JywnQ1I1JywnQ1I2JykgQ0hBUkFDVEVSIFNFVCB1dGY4IENPTExBVEUgdXRmOF9nZW5lcmFsX2NpIERFRkFVTFQgTlVMTCwKICBgcGxhbm5lcmAgaW50IE5PVCBOVUxMLAogIGBzdGF0ZV9hcmVhYCBlbnVtKCdSZWNlaXZlZCcsJ1NlbnQnLCdOb3QgU2VudCcsJycpIE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRfYWN0aXZpdHlgKSwKICBLRVkgYGZrX21haW50ZW5hbmNlX3Byb2NlZHVyZV9lbnRpdHlgIChgYXJlYWApLAogIEtFWSBgZmtfbWFpbnRlbmFuY2VfcHJvY2VkdXJlX2VtcGxveWVlX2lkeGAgKGBwbGFubmVyYCksCiAgQ09OU1RSQUlOVCBgZmtfbWFpbnRlbmFuY2VfcHJvY2VkdXJlX2VtcGxveWVlYCBGT1JFSUdOIEtFWSAoYHBsYW5uZXJgKSBSRUZFUkVOQ0VTIGBlbXBsb3llZWAgKGBpZF9lbXBsb3llZWApLAogIENPTlNUUkFJTlQgYGZrX21haW50ZW5hbmNlX3Byb2NlZHVyZV9lbnRpdHlgIEZPUkVJR04gS0VZIChgYXJlYWApIFJFRkVSRU5DRVMgYGVudGl0eWAgKGBpZF9lbnRpdHlgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MjAgREVGQVVMVCBDSEFSU0VUPXV0Zjg=";

    /**
     * setIdActivity Sets the class attribute idActivity with a given value
     *
     * The attribute idActivity maps the field id_activity defined as int.<br>
     * Comment for field id_activity: Not specified.<br>
     * @param int $idActivity
     * @category Modifier
     */
    public function setIdActivity($idActivity)
    {
        $this->idActivity = (int)$idActivity;
    }

    /**
     * setEstimatedIntervetionTime Sets the class attribute estimatedIntervetionTime with a given value
     *
     * The attribute estimatedIntervetionTime maps the field estimated_intervetion_time defined as int.<br>
     * Comment for field estimated_intervetion_time: Not specified.<br>
     * @param int $estimatedIntervetionTime
     * @category Modifier
     */
    public function setEstimatedIntervetionTime($estimatedIntervetionTime)
    {
        $this->estimatedIntervetionTime = (int)$estimatedIntervetionTime;
    }

    /**
     * setActivityDescription Sets the class attribute activityDescription with a given value
     *
     * The attribute activityDescription maps the field activity_description defined as varchar(2048).<br>
     * Comment for field activity_description: Not specified.<br>
     * @param string $activityDescription
     * @category Modifier
     */
    public function setActivityDescription($activityDescription)
    {
        $this->activityDescription = (string)$activityDescription;
    }

    /**
     * setInterruptible Sets the class attribute interruptible with a given value
     *
     * The attribute interruptible maps the field interruptible defined as tinyint(1).<br>
     * Comment for field interruptible: Not specified.<br>
     * @param int $interruptible
     * @category Modifier
     */
    public function setInterruptible($interruptible)
    {
        $this->interruptible = (int)$interruptible;
    }

    /**
     * setWeek Sets the class attribute week with a given value
     *
     * The attribute week maps the field week defined as int.<br>
     * Comment for field week: Not specified.<br>
     * @param int $week
     * @category Modifier
     */
    public function setWeek($week)
    {
        $this->week = (int)$week;
    }

    /**
     * setSmpFile Sets the class attribute smpFile with a given value
     *
     * The attribute smpFile maps the field smp_file defined as blob.<br>
     * Comment for field smp_file: Not specified.<br>
     * @param null $smpFile
     * @category Modifier
     */
    public function setSmpFile($smpFile)
    {
        $this->smpFile = (string)$smpFile;
    }

    /**
     * setTipology Sets the class attribute tipology with a given value
     *
     * The attribute tipology maps the field tipology defined as enum('Mechanical','Electric','Hydraulic','Electronics').<br>
     * Comment for field tipology: Not specified.<br>
     * @param string $tipology
     * @category Modifier
     */
    public function setTipology($tipology)
    {
        $this->tipology = (string)$tipology;
    }

    /**
     * setMachine Sets the class attribute machine with a given value
     *
     * The attribute machine maps the field machine defined as varchar(128).<br>
     * Comment for field machine: Not specified.<br>
     * @param string $machine
     * @category Modifier
     */
    public function setMachine($machine)
    {
        $this->machine = (string)$machine;
    }

    /**
     * setProcedureClass Sets the class attribute procedureClass with a given value
     *
     * The attribute procedureClass maps the field procedure_class defined as enum('extra','planned procedure','unplanned procedure (ewo)','').<br>
     * Comment for field procedure_class: Not specified.<br>
     * @param string $procedureClass
     * @category Modifier
     */
    public function setProcedureClass($procedureClass)
    {
        $this->procedureClass = (string)$procedureClass;
    }

    /**
     * setArea Sets the class attribute area with a given value
     *
     * The attribute area maps the field area defined as int.<br>
     * Comment for field area: Not specified.<br>
     * @param int $area
     * @category Modifier
     */
    public function setArea($area)
    {
        $this->area = (int)$area;
    }

    /**
     * setGeneralState Sets the class attribute generalState with a given value
     *
     * The attribute generalState maps the field general_state defined as enum('Closed','In progress','Not started','').<br>
     * Comment for field general_state: Not specified.<br>
     * @param string $generalState
     * @category Modifier
     */
    public function setGeneralState($generalState)
    {
        $this->generalState = (string)$generalState;
    }

    /**
     * setCause Sets the class attribute cause with a given value
     *
     * The attribute cause maps the field cause defined as enum('CR1','CR2','CR3','CR4','CR5','CR6').<br>
     * Comment for field cause: Not specified.<br>
     * @param string $cause
     * @category Modifier
     */
    public function setCause($cause)
    {
        $this->cause = (string)$cause;
    }

    /**
     * setPlanner Sets the class attribute planner with a given value
     *
     * The attribute planner maps the field planner defined as int.<br>
     * Comment for field planner: Not specified.<br>
     * @param int $planner
     * @category Modifier
     */
    public function setPlanner($planner)
    {
        $this->planner = (int)$planner;
    }

    /**
     * setStateArea Sets the class attribute stateArea with a given value
     *
     * The attribute stateArea maps the field state_area defined as enum('Received','Sent','Not Sent','').<br>
     * Comment for field state_area: Not specified.<br>
     * @param string $stateArea
     * @category Modifier
     */
    public function setStateArea($stateArea)
    {
        $this->stateArea = (string)$stateArea;
    }

    /**
     * getIdActivity gets the class attribute idActivity value
     *
     * The attribute idActivity maps the field id_activity defined as int.<br>
     * Comment for field id_activity: Not specified.
     * @return int $idActivity
     * @category Accessor of $idActivity
     */
    public function getIdActivity()
    {
        return $this->idActivity;
    }

    /**
     * getEstimatedIntervetionTime gets the class attribute estimatedIntervetionTime value
     *
     * The attribute estimatedIntervetionTime maps the field estimated_intervetion_time defined as int.<br>
     * Comment for field estimated_intervetion_time: Not specified.
     * @return int $estimatedIntervetionTime
     * @category Accessor of $estimatedIntervetionTime
     */
    public function getEstimatedIntervetionTime()
    {
        return $this->estimatedIntervetionTime;
    }

    /**
     * getActivityDescription gets the class attribute activityDescription value
     *
     * The attribute activityDescription maps the field activity_description defined as varchar(2048).<br>
     * Comment for field activity_description: Not specified.
     * @return string $activityDescription
     * @category Accessor of $activityDescription
     */
    public function getActivityDescription()
    {
        return $this->activityDescription;
    }

    /**
     * getInterruptible gets the class attribute interruptible value
     *
     * The attribute interruptible maps the field interruptible defined as tinyint(1).<br>
     * Comment for field interruptible: Not specified.
     * @return int $interruptible
     * @category Accessor of $interruptible
     */
    public function getInterruptible()
    {
        return $this->interruptible;
    }

    /**
     * getWeek gets the class attribute week value
     *
     * The attribute week maps the field week defined as int.<br>
     * Comment for field week: Not specified.
     * @return int $week
     * @category Accessor of $week
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * getSmpFile gets the class attribute smpFile value
     *
     * The attribute smpFile maps the field smp_file defined as blob.<br>
     * Comment for field smp_file: Not specified.
     * @return null $smpFile
     * @category Accessor of $smpFile
     */
    public function getSmpFile()
    {
        return $this->smpFile;
    }

    /**
     * getTipology gets the class attribute tipology value
     *
     * The attribute tipology maps the field tipology defined as enum('Mechanical','Electric','Hydraulic','Electronics').<br>
     * Comment for field tipology: Not specified.
     * @return string $tipology
     * @category Accessor of $tipology
     */
    public function getTipology()
    {
        return $this->tipology;
    }

    /**
     * getMachine gets the class attribute machine value
     *
     * The attribute machine maps the field machine defined as varchar(128).<br>
     * Comment for field machine: Not specified.
     * @return string $machine
     * @category Accessor of $machine
     */
    public function getMachine()
    {
        return $this->machine;
    }

    /**
     * getProcedureClass gets the class attribute procedureClass value
     *
     * The attribute procedureClass maps the field procedure_class defined as enum('extra','planned procedure','unplanned procedure (ewo)','').<br>
     * Comment for field procedure_class: Not specified.
     * @return string $procedureClass
     * @category Accessor of $procedureClass
     */
    public function getProcedureClass()
    {
        return $this->procedureClass;
    }

    /**
     * getArea gets the class attribute area value
     *
     * The attribute area maps the field area defined as int.<br>
     * Comment for field area: Not specified.
     * @return int $area
     * @category Accessor of $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * getGeneralState gets the class attribute generalState value
     *
     * The attribute generalState maps the field general_state defined as enum('Closed','In progress','Not started','').<br>
     * Comment for field general_state: Not specified.
     * @return string $generalState
     * @category Accessor of $generalState
     */
    public function getGeneralState()
    {
        return $this->generalState;
    }

    /**
     * getCause gets the class attribute cause value
     *
     * The attribute cause maps the field cause defined as enum('CR1','CR2','CR3','CR4','CR5','CR6').<br>
     * Comment for field cause: Not specified.
     * @return string $cause
     * @category Accessor of $cause
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * getPlanner gets the class attribute planner value
     *
     * The attribute planner maps the field planner defined as int.<br>
     * Comment for field planner: Not specified.
     * @return int $planner
     * @category Accessor of $planner
     */
    public function getPlanner()
    {
        return $this->planner;
    }

    /**
     * getStateArea gets the class attribute stateArea value
     *
     * The attribute stateArea maps the field state_area defined as enum('Received','Sent','Not Sent','').<br>
     * Comment for field state_area: Not specified.
     * @return string $stateArea
     * @category Accessor of $stateArea
     */
    public function getStateArea()
    {
        return $this->stateArea;
    }

    /**
     * Gets DDL SQL code of the table maintenance_procedure
     * @return string
     * @category Accessor
     */
    public function getDdl()
    {
        return base64_decode($this->ddl);
    }

    /**
     * Gets the name of the managed table
     * @return string
     * @category Accessor
     */
    public function getTableName()
    {
        return "maintenance_procedure";
    }

    /**
     * The BeanMaintenanceProcedure constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idActivity is given.
     *  - with a fetched data row from the table maintenance_procedure having id_activity=$idActivity
     * @param int $idActivity . If omitted an empty (not fetched) instance is created.
     * @return BeanMaintenanceProcedure Object
     */
    public function __construct($idActivity = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idActivity)) {
            $this->select($idActivity);
        }
    }

    /**
     * The implicit destructor
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * Explicit destructor. It calls the implicit destructor automatically.
     */
    public function close()
    {
        // unset($this);
    }

    /**
     * Fetchs a table row of maintenance_procedure into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idActivity the primary key id_activity value of table maintenance_procedure which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idActivity)
    {
        $sql = "SELECT * FROM maintenance_procedure WHERE id_activity={$this->parseValue($idActivity,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idActivity = (integer)$rowObject->id_activity;
            @$this->estimatedIntervetionTime = (integer)$rowObject->estimated_intervetion_time;
            @$this->activityDescription = $this->replaceAposBackSlash($rowObject->activity_description);
            @$this->interruptible = (integer)$rowObject->interruptible;
            @$this->week = (integer)$rowObject->week;
            @$this->smpFile = $rowObject->smp_file;
            @$this->tipology = $rowObject->tipology;
            @$this->machine = $this->replaceAposBackSlash($rowObject->machine);
            @$this->procedureClass = $rowObject->procedure_class;
            @$this->area = (integer)$rowObject->area;
            @$this->generalState = $rowObject->general_state;
            @$this->cause = $rowObject->cause;
            @$this->planner = (integer)$rowObject->planner;
            @$this->stateArea = $rowObject->state_area;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table maintenance_procedure
     * @param int $idActivity the primary key id_activity value of table maintenance_procedure which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idActivity)
    {
        $sql = "DELETE FROM maintenance_procedure WHERE id_activity={$this->parseValue($idActivity,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of maintenance_procedure
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idActivity = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO maintenance_procedure
            (estimated_intervetion_time,activity_description,interruptible,week,smp_file,tipology,machine,procedure_class,area,general_state,cause,planner,state_area)
            VALUES(
			{$this->parseValue($this->estimatedIntervetionTime)},
			{$this->parseValue($this->activityDescription, 'notNumber')},
			{$this->parseValue($this->interruptible)},
			{$this->parseValue($this->week)},
			{$this->parseValue($this->smpFile, 'notNumber')},
			{$this->parseValue($this->tipology, 'notNumber')},
			{$this->parseValue($this->machine, 'notNumber')},
			{$this->parseValue($this->procedureClass, 'notNumber')},
			{$this->parseValue($this->area)},
			{$this->parseValue($this->generalState, 'notNumber')},
			{$this->parseValue($this->cause, 'notNumber')},
			{$this->parseValue($this->planner)},
			{$this->parseValue($this->stateArea, 'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idActivity = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table maintenance_procedure with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idActivity the primary key id_activity value of table maintenance_procedure which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idActivity)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                maintenance_procedure
            SET 
				estimated_intervetion_time={$this->parseValue($this->estimatedIntervetionTime)},
				activity_description={$this->parseValue($this->activityDescription, 'notNumber')},
				interruptible={$this->parseValue($this->interruptible)},
				week={$this->parseValue($this->week)},
				smp_file={$this->parseValue($this->smpFile, 'notNumber')},
				tipology={$this->parseValue($this->tipology, 'notNumber')},
				machine={$this->parseValue($this->machine, 'notNumber')},
				procedure_class={$this->parseValue($this->procedureClass, 'notNumber')},
				area={$this->parseValue($this->area)},
				general_state={$this->parseValue($this->generalState, 'notNumber')},
				cause={$this->parseValue($this->cause, 'notNumber')},
				planner={$this->parseValue($this->planner)},
				state_area={$this->parseValue($this->stateArea, 'notNumber')}
            WHERE
                id_activity={$this->parseValue($idActivity, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idActivity);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of maintenance_procedure previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idActivity != "") {
            return $this->update($this->idActivity);
        } else {
            return false;
        }
    }

}

?>
