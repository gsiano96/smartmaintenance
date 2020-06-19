<?php
/**
 * Class BeanEmployeesJobs
 * Bean class for object oriented management of the MySQL table employees_jobs
 *
 * Comment of the managed table employees_jobs: Jobs assignment for each employees.
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
 * @filesource BeanEmployeesJobs.php
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


class BeanEmployeesJobs extends MySqlRecord
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
     * Class attribute for mapping table field id_job
     *
     * Comment for field id_job: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idJob
     */
    private $idJob;

    /**
     * Class attribute for storing the SQL DDL of table employees_jobs
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbXBsb3llZXNfam9ic2AgKAogIGBpZF9lbXBsb3llZWAgaW50IE5PVCBOVUxMLAogIGBpZF9qb2JgIGludCBOT1QgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkX2VtcGxveWVlYCxgaWRfam9iYCksCiAgS0VZIGBma19lbXBsb3llZXNfam9ic19pZHhgIChgaWRfam9iYCksCiAgQ09OU1RSQUlOVCBgZmtfZW1wbG95ZWVzYCBGT1JFSUdOIEtFWSAoYGlkX2VtcGxveWVlYCkgUkVGRVJFTkNFUyBgZW1wbG95ZWVgIChgaWRfZW1wbG95ZWVgKSwKICBDT05TVFJBSU5UIGBma19lbXBsb3llZXNfam9ic2AgRk9SRUlHTiBLRVkgKGBpZF9qb2JgKSBSRUZFUkVOQ0VTIGBqb2JgIChgaWRfam9iYCkKKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J0pvYnMgYXNzaWdubWVudCBmb3IgZWFjaCBlbXBsb3llZXMn";

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
     * setIdJob Sets the class attribute idJob with a given value
     *
     * The attribute idJob maps the field id_job defined as int.<br>
     * Comment for field id_job: Not specified.<br>
     * @param int $idJob
     * @category Modifier
     */
    public function setIdJob($idJob)
    {
        $this->idJob = (int)$idJob;
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
     * getIdJob gets the class attribute idJob value
     *
     * The attribute idJob maps the field id_job defined as int.<br>
     * Comment for field id_job: Not specified.
     * @return int $idJob
     * @category Accessor of $idJob
     */
    public function getIdJob()
    {
        return $this->idJob;
    }

    /**
     * Gets DDL SQL code of the table employees_jobs
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
        return "employees_jobs";
    }

    /**
     * The BeanEmployeesJobs constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEmployee
     * @param int $idJob
     * @return BeanEmployeesJobs Object
     */
    public function __construct($idEmployee = NULL, $idJob = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEmployee) && !empty($idJob)) {
            $this->select($idEmployee, $idJob);
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
     * Fetchs a table row of employees_jobs into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEmployee
     * @param int $idJob
     * @return int affected selected row
     * @category DML
     */
    public function select($idEmployee, $idJob)
    {
        $sql = "SELECT * FROM employees_jobs WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEmployee = (integer)$rowObject->id_employee;
            @$this->idJob = (integer)$rowObject->id_job;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table employees_jobs
     * @param int $idEmployee
     * @param int $idJob
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEmployee, $idJob)
    {
        $sql = "DELETE FROM employees_jobs WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of employees_jobs
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO employees_jobs
        (id_employee,id_job)
        VALUES({$this->parseValue($this->idEmployee)},
			{$this->parseValue($this->idJob)})
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
     * Updates a specific row from the table employees_jobs with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEmployee
     * @param int $idJob
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEmployee, $idJob)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                employees_jobs
                SET 
            WHERE
                id_employee={$this->parseValue($idEmployee, 'int')} AND id_job={$this->parseValue($idJob, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEmployee, $idJob);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of employees_jobs previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEmployee) && !empty($this->idJob)) {
            return $this->update($this->idEmployee, $this->idJob);
        } else {
            return false;
        }
    }

}

?>
