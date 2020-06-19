<?php
/**
 * Class BeanEmployeesMaintenanceProcedures
 * Bean class for object oriented management of the MySQL table employees_maintenance_procedures
 *
 * Comment of the managed table employees_maintenance_procedures: Not specified.
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
 * @implements none
 * @filesource BeanEmployeesMaintenanceProcedures.php
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


class BeanEmployeesMaintenanceProcedures extends MySqlRecord
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
     * Class attribute for mapping table field id_employee
     *
     * Comment for field id_employee: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idEmployee
     */
    private $idEmployee;

    /**
     * Class attribute for mapping table field id_maintenance_procedure
     *
     * Comment for field id_maintenance_procedure: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idMaintenanceProcedure
     */
    private $idMaintenanceProcedure;

    /**
     * Class attribute for mapping table field start_datetime
     *
     * Comment for field start_datetime: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $startDatetime
     */
    private $startDatetime;

    /**
     * Class attribute for mapping table field stop_datetime
     *
     * Comment for field stop_datetime: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $stopDatetime
     */
    private $stopDatetime;

    /**
     * Class attribute for mapping table field state_maintainer
     *
     * Comment for field state_maintainer: Not specified.<br>
     * Field information:
     *  - Data type: enum('Sent','Received','Read')
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $stateMaintainer
     */
    private $stateMaintainer;

    /**
     * Class attribute for mapping table field note
     *
     * Comment for field note: Not specified.<br>
     * Field information:
     *  - Data type: varchar(145)
     *  - Null : YES
     *  - DB Index:
     *  - Default: Null
     *  - Extra:
     * @var string $note
     */
    private $note;

    /**
     * Class attribute for mapping table field expected_date
     *
     * Comment for field expected_date: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $expectedDate
     */
    private $expectedDate;

    /**
     * Class attribute for mapping table field job1
     *
     * Comment for field job1: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $job1
     */
    private $job1;

    /**
     * Class attribute for storing the SQL DDL of table employees_maintenance_procedures
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbXBsb3llZXNfbWFpbnRlbmFuY2VfcHJvY2VkdXJlc2AgKAogIGBpZF9lbXBsb3llZWAgaW50IE5PVCBOVUxMLAogIGBpZF9tYWludGVuYW5jZV9wcm9jZWR1cmVgIGludCBOT1QgTlVMTCwKICBgc3RhcnRfZGF0ZXRpbWVgIGRhdGV0aW1lIERFRkFVTFQgTlVMTCwKICBgc3RvcF9kYXRldGltZWAgZGF0ZXRpbWUgREVGQVVMVCBOVUxMLAogIGBzdGF0ZV9tYWludGFpbmVyYCBlbnVtKCdTZW50JywnUmVjZWl2ZWQnLCdSZWFkJykgTk9UIE5VTEwsCiAgYG5vdGVgIHZhcmNoYXIoMTQ1KSBERUZBVUxUICdOdWxsJywKICBgZXhwZWN0ZWRfZGF0ZWAgZGF0ZXRpbWUgTk9UIE5VTEwsCiAgYGpvYjFgIGRhdGV0aW1lIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkX2VtcGxveWVlYCxgaWRfbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCksCiAgS0VZIGBma19tYWludGVuYW5jZV9wcm9jZWR1cmVzX2VtcGxveWVlc19pZHhgIChgaWRfbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCksCiAgQ09OU1RSQUlOVCBgZmtfZW1wbG95ZWVzX21haW50ZW5hbmNlX3Byb2NlZHVyZXNgIEZPUkVJR04gS0VZIChgaWRfZW1wbG95ZWVgKSBSRUZFUkVOQ0VTIGBlbXBsb3llZWAgKGBpZF9lbXBsb3llZWApLAogIENPTlNUUkFJTlQgYGZrX21haW50ZW5hbmNlX3Byb2NlZHVyZXNfZW1wbG95ZWVzYCBGT1JFSUdOIEtFWSAoYGlkX21haW50ZW5hbmNlX3Byb2NlZHVyZWApIFJFRkVSRU5DRVMgYG1haW50ZW5hbmNlX3Byb2NlZHVyZWAgKGBpZF9hY3Rpdml0eWApCikgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmOA==";

    /**
     * setIdEmployee Sets the class attribute idEmployee with a given value
     *
     * The attribute idEmployee maps the field id_employee defined as int.<br>
     * Comment for field id_employee: Not specified.<br>
     * @param int $idEmployee
     * @category Modifier
     */
    public function setIdEmployee($idEmployee)
    {
        $this->idEmployee = (int)$idEmployee;
    }

    /**
     * setIdMaintenanceProcedure Sets the class attribute idMaintenanceProcedure with a given value
     *
     * The attribute idMaintenanceProcedure maps the field id_maintenance_procedure defined as int.<br>
     * Comment for field id_maintenance_procedure: Not specified.<br>
     * @param int $idMaintenanceProcedure
     * @category Modifier
     */
    public function setIdMaintenanceProcedure($idMaintenanceProcedure)
    {
        $this->idMaintenanceProcedure = (int)$idMaintenanceProcedure;
    }

    /**
     * setStartDatetime Sets the class attribute startDatetime with a given value
     *
     * The attribute startDatetime maps the field start_datetime defined as datetime.<br>
     * Comment for field start_datetime: Not specified.<br>
     * @param string $startDatetime
     * @category Modifier
     */
    public function setStartDatetime($startDatetime)
    {
        $this->startDatetime = (string)$startDatetime;
    }

    /**
     * setStopDatetime Sets the class attribute stopDatetime with a given value
     *
     * The attribute stopDatetime maps the field stop_datetime defined as datetime.<br>
     * Comment for field stop_datetime: Not specified.<br>
     * @param string $stopDatetime
     * @category Modifier
     */
    public function setStopDatetime($stopDatetime)
    {
        $this->stopDatetime = (string)$stopDatetime;
    }

    /**
     * setStateMaintainer Sets the class attribute stateMaintainer with a given value
     *
     * The attribute stateMaintainer maps the field state_maintainer defined as enum('Sent','Received','Read').<br>
     * Comment for field state_maintainer: Not specified.<br>
     * @param string $stateMaintainer
     * @category Modifier
     */
    public function setStateMaintainer($stateMaintainer)
    {
        $this->stateMaintainer = (string)$stateMaintainer;
    }

    /**
     * setNote Sets the class attribute note with a given value
     *
     * The attribute note maps the field note defined as varchar(145).<br>
     * Comment for field note: Not specified.<br>
     * @param string $note
     * @category Modifier
     */
    public function setNote($note)
    {
        $this->note = (string)$note;
    }

    /**
     * setExpectedDate Sets the class attribute expectedDate with a given value
     *
     * The attribute expectedDate maps the field expected_date defined as datetime.<br>
     * Comment for field expected_date: Not specified.<br>
     * @param string $expectedDate
     * @category Modifier
     */
    public function setExpectedDate($expectedDate)
    {
        $this->expectedDate = (string)$expectedDate;
    }

    /**
     * setJob1 Sets the class attribute job1 with a given value
     *
     * The attribute job1 maps the field job1 defined as datetime.<br>
     * Comment for field job1: Not specified.<br>
     * @param string $job1
     * @category Modifier
     */
    public function setJob1($job1)
    {
        $this->job1 = (string)$job1;
    }

    /**
     * getIdEmployee gets the class attribute idEmployee value
     *
     * The attribute idEmployee maps the field id_employee defined as int.<br>
     * Comment for field id_employee: Not specified.
     * @return int $idEmployee
     * @category Accessor of $idEmployee
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * getIdMaintenanceProcedure gets the class attribute idMaintenanceProcedure value
     *
     * The attribute idMaintenanceProcedure maps the field id_maintenance_procedure defined as int.<br>
     * Comment for field id_maintenance_procedure: Not specified.
     * @return int $idMaintenanceProcedure
     * @category Accessor of $idMaintenanceProcedure
     */
    public function getIdMaintenanceProcedure()
    {
        return $this->idMaintenanceProcedure;
    }

    /**
     * getStartDatetime gets the class attribute startDatetime value
     *
     * The attribute startDatetime maps the field start_datetime defined as datetime.<br>
     * Comment for field start_datetime: Not specified.
     * @return string $startDatetime
     * @category Accessor of $startDatetime
     */
    public function getStartDatetime()
    {
        return $this->startDatetime;
    }

    /**
     * getStopDatetime gets the class attribute stopDatetime value
     *
     * The attribute stopDatetime maps the field stop_datetime defined as datetime.<br>
     * Comment for field stop_datetime: Not specified.
     * @return string $stopDatetime
     * @category Accessor of $stopDatetime
     */
    public function getStopDatetime()
    {
        return $this->stopDatetime;
    }

    /**
     * getStateMaintainer gets the class attribute stateMaintainer value
     *
     * The attribute stateMaintainer maps the field state_maintainer defined as enum('Sent','Received','Read').<br>
     * Comment for field state_maintainer: Not specified.
     * @return string $stateMaintainer
     * @category Accessor of $stateMaintainer
     */
    public function getStateMaintainer()
    {
        return $this->stateMaintainer;
    }

    /**
     * getNote gets the class attribute note value
     *
     * The attribute note maps the field note defined as varchar(145).<br>
     * Comment for field note: Not specified.
     * @return string $note
     * @category Accessor of $note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * getExpectedDate gets the class attribute expectedDate value
     *
     * The attribute expectedDate maps the field expected_date defined as datetime.<br>
     * Comment for field expected_date: Not specified.
     * @return string $expectedDate
     * @category Accessor of $expectedDate
     */
    public function getExpectedDate()
    {
        return $this->expectedDate;
    }

    /**
     * getJob1 gets the class attribute job1 value
     *
     * The attribute job1 maps the field job1 defined as datetime.<br>
     * Comment for field job1: Not specified.
     * @return string $job1
     * @category Accessor of $job1
     */
    public function getJob1()
    {
        return $this->job1;
    }

    /**
     * Gets DDL SQL code of the table employees_maintenance_procedures
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
        return "employees_maintenance_procedures";
    }

    /**
     * The BeanEmployeesMaintenanceProcedures constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEmployee
     * @param int $idMaintenanceProcedure
     * @return BeanEmployeesMaintenanceProcedures Object
     */
    public function __construct($idEmployee = NULL, $idMaintenanceProcedure = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEmployee) && !empty($idMaintenanceProcedure)) {
            $this->select($idEmployee, $idMaintenanceProcedure);
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
        unset($this);
    }

    /**
     * Fetchs a table row of employees_maintenance_procedures into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEmployee
     * @param int $idMaintenanceProcedure
     * @return int affected selected row
     * @category DML
     */
    public function select($idEmployee, $idMaintenanceProcedure)
    {
        $sql = "SELECT * FROM employees_maintenance_procedures WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEmployee = (integer)$rowObject->id_employee;
            @$this->idMaintenanceProcedure = (integer)$rowObject->id_maintenance_procedure;
            @$this->startDatetime = empty($rowObject->start_datetime) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->start_datetime));
            @$this->stopDatetime = empty($rowObject->stop_datetime) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->stop_datetime));
            @$this->stateMaintainer = $rowObject->state_maintainer;
            @$this->note = $this->replaceAposBackSlash($rowObject->note);
            @$this->expectedDate = empty($rowObject->expected_date) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->expected_date));
            @$this->job1 = empty($rowObject->job1) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->job1));
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table employees_maintenance_procedures
     * @param int $idEmployee
     * @param int $idMaintenanceProcedure
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEmployee, $idMaintenanceProcedure)
    {
        $sql = "DELETE FROM employees_maintenance_procedures WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of employees_maintenance_procedures
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO employees_maintenance_procedures
        (id_employee,id_maintenance_procedure,start_datetime,stop_datetime,state_maintainer,note,expected_date,job1)
        VALUES({$this->parseValue($this->idEmployee)},
			{$this->parseValue($this->idMaintenanceProcedure)},
			{$this->parseValue($this->startDatetime, 'datetime')},
			{$this->parseValue($this->stopDatetime, 'datetime')},
			{$this->parseValue($this->stateMaintainer, 'notNumber')},
			{$this->parseValue($this->note, 'notNumber')},
			{$this->parseValue($this->expectedDate, 'datetime')},
			{$this->parseValue($this->job1, 'datetime')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
        }
        return $result;
    }

    /**
     * Updates a specific row from the table employees_maintenance_procedures with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEmployee
     * @param int $idMaintenanceProcedure
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEmployee, $idMaintenanceProcedure)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                employees_maintenance_procedures
                SET 
				start_datetime={$this->parseValue($this->startDatetime, 'datetime')},
				stop_datetime={$this->parseValue($this->stopDatetime, 'datetime')},
				state_maintainer={$this->parseValue($this->stateMaintainer, 'notNumber')},
				note={$this->parseValue($this->note, 'notNumber')},
				expected_date={$this->parseValue($this->expectedDate, 'datetime')},
				job1={$this->parseValue($this->job1, 'datetime')}
            WHERE
                id_employee={$this->parseValue($idEmployee, 'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEmployee, $idMaintenanceProcedure);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of employees_maintenance_procedures previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEmployee) && !empty($this->idMaintenanceProcedure)) {
            return $this->update($this->idEmployee, $this->idMaintenanceProcedure);
        } else {
            return false;
        }
    }

}

?>
