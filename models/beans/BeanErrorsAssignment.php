<?php
/**
 * Class BeanErrorsAssignment
 * Bean class for object oriented management of the MySQL table errors_assignment
 *
 * Comment of the managed table errors_assignment: Ascribed causes on occurred error.
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
 * @filesource BeanErrorsAssignment.php
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

class BeanErrorsAssignment extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_assignment of table errors_assignment
     *
     * Comment for field id_assignment: Not specified<br>
     * @var int $idAssignment
     */
    private $idAssignment;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field id_employee
     *
     * Comment for field id_employee: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $idEmployee
     */
    private $idEmployee;

    /**
     * Class attribute for mapping table field id_skill
     *
     * Comment for field id_skill: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $idSkill
     */
    private $idSkill;

    /**
     * Class attribute for mapping table field description
     *
     * Comment for field description: Not specified.<br>
     * Field information:
     *  - Data type: text
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $description
     */
    private $description;

    /**
     * Class attribute for mapping table field assigned_by
     *
     * Comment for field assigned_by: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $assignedBy
     */
    private $assignedBy;

    /**
     * Class attribute for mapping table field assignment_date
     *
     * Comment for field assignment_date: Not specified.<br>
     * Field information:
     *  - Data type: string|date
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $assignmentDate
     */
    private $assignmentDate;

    /**
     * Class attribute for mapping table field twttp_result
     *
     * Comment for field twttp_result: Not specified.<br>
     * Field information:
     *  - Data type: enum('ok','ko')
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $twttpResult
     */
    private $twttpResult;

    /**
     * Class attribute for mapping table field herca_result
     *
     * Comment for field herca_result: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $hercaResult
     */
    private $hercaResult;

    /**
     * Class attribute for storing the SQL DDL of table errors_assignment
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlcnJvcnNfYXNzaWdubWVudGAgKAogIGBpZF9hc3NpZ25tZW50YCBpbnQgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGlkX2VtcGxveWVlYCBpbnQgTk9UIE5VTEwsCiAgYGlkX3NraWxsYCBpbnQgTk9UIE5VTEwsCiAgYGRlc2NyaXB0aW9uYCB0ZXh0LAogIGBhc3NpZ25lZF9ieWAgaW50IE5PVCBOVUxMLAogIGBhc3NpZ25tZW50X2RhdGVgIGRhdGUgREVGQVVMVCBOVUxMLAogIGB0d3R0cF9yZXN1bHRgIGVudW0oJ29rJywna28nKSBERUZBVUxUIE5VTEwsCiAgYGhlcmNhX3Jlc3VsdGAgdmFyY2hhcigxMDApIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkX2Fzc2lnbm1lbnRgKSwKICBLRVkgYGZrX2h1bWFuX2Vycm9yX2NhdXNlc19lbXBsb3llZXNfc2tpbGxzX2Fzc2Vzc21lbnQxX2lkeGAgKGBpZF9lbXBsb3llZWAsYGlkX3NraWxsYCksCiAgS0VZIGBma19odW1hbl9lcnJvcl9jYXVzZXNfdXNlcjFfaWR4YCAoYGFzc2lnbmVkX2J5YCksCiAgQ09OU1RSQUlOVCBgZmtfaHVtYW5fZXJyb3JfY2F1c2VzX2VtcGxveWVlc19za2lsbHNfYXNzZXNzbWVudDFgIEZPUkVJR04gS0VZIChgaWRfZW1wbG95ZWVgLCBgaWRfc2tpbGxgKSBSRUZFUkVOQ0VTIGBlbXBsb3llZXNfc2tpbGxzYCAoYGlkX2VtcGxveWVlYCwgYGlkX3NraWxsYCksCiAgQ09OU1RSQUlOVCBgZmtfaHVtYW5fZXJyb3JfY2F1c2VzX3VzZXIxYCBGT1JFSUdOIEtFWSAoYGFzc2lnbmVkX2J5YCkgUkVGRVJFTkNFUyBgdXNlcmAgKGBpZF91c2VyYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTM2IERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J0FzY3JpYmVkIGNhdXNlcyBvbiBvY2N1cnJlZCBlcnJvcic=";

    /**
     * setIdAssignment Sets the class attribute idAssignment with a given value
     *
     * The attribute idAssignment maps the field id_assignment defined as int.<br>
     * Comment for field id_assignment: Not specified.<br>
     * @param int $idAssignment
     * @category Modifier
     */
    public function setIdAssignment($idAssignment)
    {
        $this->idAssignment = (int)$idAssignment;
    }

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
     * setIdSkill Sets the class attribute idSkill with a given value
     *
     * The attribute idSkill maps the field id_skill defined as int.<br>
     * Comment for field id_skill: Not specified.<br>
     * @param int $idSkill
     * @category Modifier
     */
    public function setIdSkill($idSkill)
    {
        $this->idSkill = (int)$idSkill;
    }

    /**
     * setDescription Sets the class attribute description with a given value
     *
     * The attribute description maps the field description defined as text.<br>
     * Comment for field description: Not specified.<br>
     * @param string $description
     * @category Modifier
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;
    }

    /**
     * setAssignedBy Sets the class attribute assignedBy with a given value
     *
     * The attribute assignedBy maps the field assigned_by defined as int.<br>
     * Comment for field assigned_by: Not specified.<br>
     * @param int $assignedBy
     * @category Modifier
     */
    public function setAssignedBy($assignedBy)
    {
        $this->assignedBy = (int)$assignedBy;
    }

    /**
     * setAssignmentDate Sets the class attribute assignmentDate with a given value
     *
     * The attribute assignmentDate maps the field assignment_date defined as string|date.<br>
     * Comment for field assignment_date: Not specified.<br>
     * @param string $assignmentDate
     * @category Modifier
     */
    public function setAssignmentDate($assignmentDate)
    {
        $this->assignmentDate = (string)$assignmentDate;
    }

    /**
     * setTwttpResult Sets the class attribute twttpResult with a given value
     *
     * The attribute twttpResult maps the field twttp_result defined as enum('ok','ko').<br>
     * Comment for field twttp_result: Not specified.<br>
     * @param string $twttpResult
     * @category Modifier
     */
    public function setTwttpResult($twttpResult)
    {
        $this->twttpResult = (string)$twttpResult;
    }

    /**
     * setHercaResult Sets the class attribute hercaResult with a given value
     *
     * The attribute hercaResult maps the field herca_result defined as varchar(100).<br>
     * Comment for field herca_result: Not specified.<br>
     * @param string $hercaResult
     * @category Modifier
     */
    public function setHercaResult($hercaResult)
    {
        $this->hercaResult = (string)$hercaResult;
    }

    /**
     * getIdAssignment gets the class attribute idAssignment value
     *
     * The attribute idAssignment maps the field id_assignment defined as int.<br>
     * Comment for field id_assignment: Not specified.
     * @return int $idAssignment
     * @category Accessor of $idAssignment
     */
    public function getIdAssignment()
    {
        return $this->idAssignment;
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
     * getIdSkill gets the class attribute idSkill value
     *
     * The attribute idSkill maps the field id_skill defined as int.<br>
     * Comment for field id_skill: Not specified.
     * @return int $idSkill
     * @category Accessor of $idSkill
     */
    public function getIdSkill()
    {
        return $this->idSkill;
    }

    /**
     * getDescription gets the class attribute description value
     *
     * The attribute description maps the field description defined as text.<br>
     * Comment for field description: Not specified.
     * @return string $description
     * @category Accessor of $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * getAssignedBy gets the class attribute assignedBy value
     *
     * The attribute assignedBy maps the field assigned_by defined as int.<br>
     * Comment for field assigned_by: Not specified.
     * @return int $assignedBy
     * @category Accessor of $assignedBy
     */
    public function getAssignedBy()
    {
        return $this->assignedBy;
    }

    /**
     * getAssignmentDate gets the class attribute assignmentDate value
     *
     * The attribute assignmentDate maps the field assignment_date defined as string|date.<br>
     * Comment for field assignment_date: Not specified.
     * @return string $assignmentDate
     * @category Accessor of $assignmentDate
     */
    public function getAssignmentDate()
    {
        return $this->assignmentDate;
    }

    /**
     * getTwttpResult gets the class attribute twttpResult value
     *
     * The attribute twttpResult maps the field twttp_result defined as enum('ok','ko').<br>
     * Comment for field twttp_result: Not specified.
     * @return string $twttpResult
     * @category Accessor of $twttpResult
     */
    public function getTwttpResult()
    {
        return $this->twttpResult;
    }

    /**
     * getHercaResult gets the class attribute hercaResult value
     *
     * The attribute hercaResult maps the field herca_result defined as varchar(100).<br>
     * Comment for field herca_result: Not specified.
     * @return string $hercaResult
     * @category Accessor of $hercaResult
     */
    public function getHercaResult()
    {
        return $this->hercaResult;
    }

    /**
     * Gets DDL SQL code of the table errors_assignment
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
        return "errors_assignment";
    }

    /**
     * The BeanErrorsAssignment constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idAssignment is given.
     *  - with a fetched data row from the table errors_assignment having id_assignment=$idAssignment
     * @param int $idAssignment . If omitted an empty (not fetched) instance is created.
     * @return BeanErrorsAssignment Object
     */
    public function __construct($idAssignment = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idAssignment)) {
            $this->select($idAssignment);
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
     * Fetchs a table row of errors_assignment into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idAssignment the primary key id_assignment value of table errors_assignment which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idAssignment)
    {
        $sql = "SELECT * FROM errors_assignment WHERE id_assignment={$this->parseValue($idAssignment,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idAssignment = (integer)$rowObject->id_assignment;
            @$this->idEmployee = (integer)$rowObject->id_employee;
            @$this->idSkill = (integer)$rowObject->id_skill;
            @$this->description = $this->replaceAposBackSlash($rowObject->description);
            @$this->assignedBy = (integer)$rowObject->assigned_by;
            @$this->assignmentDate = empty($rowObject->assignment_date) ? null : date(FETCHED_DATE_FORMAT, strtotime($rowObject->assignment_date));
            @$this->twttpResult = $rowObject->twttp_result;
            @$this->hercaResult = $this->replaceAposBackSlash($rowObject->herca_result);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table errors_assignment
     * @param int $idAssignment the primary key id_assignment value of table errors_assignment which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idAssignment)
    {
        $sql = "DELETE FROM errors_assignment WHERE id_assignment={$this->parseValue($idAssignment,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of errors_assignment
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idAssignment = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO errors_assignment
            (id_employee,id_skill,description,assigned_by,assignment_date,twttp_result,herca_result)
            VALUES(
			{$this->parseValue($this->idEmployee)},
			{$this->parseValue($this->idSkill)},
			{$this->parseValue($this->description, 'notNumber')},
			{$this->parseValue($this->assignedBy)},
			{$this->parseValue($this->assignmentDate, 'date')},
			{$this->parseValue($this->twttpResult, 'notNumber')},
			{$this->parseValue($this->hercaResult, 'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idAssignment = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table errors_assignment with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idAssignment the primary key id_assignment value of table errors_assignment which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idAssignment)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                errors_assignment
            SET 
				id_employee={$this->parseValue($this->idEmployee)},
				id_skill={$this->parseValue($this->idSkill)},
				description={$this->parseValue($this->description, 'notNumber')},
				assigned_by={$this->parseValue($this->assignedBy)},
				assignment_date={$this->parseValue($this->assignmentDate, 'date')},
				twttp_result={$this->parseValue($this->twttpResult, 'notNumber')},
				herca_result={$this->parseValue($this->hercaResult, 'notNumber')}
            WHERE
                id_assignment={$this->parseValue($idAssignment, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idAssignment);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of errors_assignment previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idAssignment != "") {
            return $this->update($this->idAssignment);
        } else {
            return false;
        }
    }

}

?>
