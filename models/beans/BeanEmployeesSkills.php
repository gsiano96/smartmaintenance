<?php
/**
 * Class BeanEmployeesSkills
 * Bean class for object oriented management of the MySQL table employees_skills
 *
 * Comment of the managed table employees_skills: Skills evaluation for each eployee job's skills.
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
 * @filesource BeanEmployeesSkills.php
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


class BeanEmployeesSkills extends MySqlRecord
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
     * Class attribute for mapping table field id_skill
     *
     * Comment for field id_skill: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idSkill
     */
    private $idSkill;

    /**
     * Class attribute for mapping table field evaluation_date
     *
     * Comment for field evaluation_date: Not specified.<br>
     * Field information:
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $evaluationDate
     */
    private $evaluationDate;

    /**
     * Class attribute for mapping table field evaluated_by
     *
     * Comment for field evaluated_by: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $evaluatedBy
     */
    private $evaluatedBy;

    /**
     * Class attribute for mapping table field estimated_level
     *
     * Comment for field estimated_level: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default: 0
     *  - Extra:
     * @var int $estimatedLevel
     */
    private $estimatedLevel;

    /**
     * Class attribute for mapping table field previous_estimated_level
     *
     * Comment for field previous_estimated_level: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $previousEstimatedLevel
     */
    private $previousEstimatedLevel;

    /**
     * Class attribute for storing the SQL DDL of table employees_skills
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbXBsb3llZXNfc2tpbGxzYCAoCiAgYGlkX2VtcGxveWVlYCBpbnQgTk9UIE5VTEwsCiAgYGlkX3NraWxsYCBpbnQgTk9UIE5VTEwsCiAgYGV2YWx1YXRpb25fZGF0ZWAgdmFyY2hhcig0NSkgREVGQVVMVCBOVUxMLAogIGBldmFsdWF0ZWRfYnlgIGludCBERUZBVUxUIE5VTEwsCiAgYGVzdGltYXRlZF9sZXZlbGAgaW50IE5PVCBOVUxMIERFRkFVTFQgJzAnLAogIGBwcmV2aW91c19lc3RpbWF0ZWRfbGV2ZWxgIGludCBERUZBVUxUIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9lbXBsb3llZWAsYGlkX3NraWxsYCksCiAgS0VZIGBma19za2lsbHNfZXBsb3llc3NfaWR4YCAoYGlkX3NraWxsYCksCiAgS0VZIGBma19lcGxveWVzc19za2lsbHNfaWR4YCAoYGlkX2VtcGxveWVlYCksCiAgS0VZIGBma191c2VyX2V2YWx1YXRvcnNfaWR4YCAoYGV2YWx1YXRlZF9ieWApLAogIENPTlNUUkFJTlQgYGZrX2VtcGxveWVlc19za2lsbHNgIEZPUkVJR04gS0VZIChgaWRfZW1wbG95ZWVgKSBSRUZFUkVOQ0VTIGBlbXBsb3llZWAgKGBpZF9lbXBsb3llZWApLAogIENPTlNUUkFJTlQgYGZrX2V2ZWx1YXRvcnNfdXNlcmAgRk9SRUlHTiBLRVkgKGBldmFsdWF0ZWRfYnlgKSBSRUZFUkVOQ0VTIGB1c2VyYCAoYGlkX3VzZXJgKSwKICBDT05TVFJBSU5UIGBma19za2lsbHNfZW1wbG95ZWVzYCBGT1JFSUdOIEtFWSAoYGlkX3NraWxsYCkgUkVGRVJFTkNFUyBgc2tpbGxgIChgaWRfc2tpbGxgKQopIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0ZjggQ09NTUVOVD0nU2tpbGxzIGV2YWx1YXRpb24gZm9yIGVhY2ggZXBsb3llZSBqb2InJ3Mgc2tpbGxzJw==";

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
     * setEvaluationDate Sets the class attribute evaluationDate with a given value
     *
     * The attribute evaluationDate maps the field evaluation_date defined as varchar(45).<br>
     * Comment for field evaluation_date: Not specified.<br>
     * @param string $evaluationDate
     * @category Modifier
     */
    public function setEvaluationDate($evaluationDate)
    {
        $this->evaluationDate = (string)$evaluationDate;
    }

    /**
     * setEvaluatedBy Sets the class attribute evaluatedBy with a given value
     *
     * The attribute evaluatedBy maps the field evaluated_by defined as int.<br>
     * Comment for field evaluated_by: Not specified.<br>
     * @param int $evaluatedBy
     * @category Modifier
     */
    public function setEvaluatedBy($evaluatedBy)
    {
        $this->evaluatedBy = (int)$evaluatedBy;
    }

    /**
     * setEstimatedLevel Sets the class attribute estimatedLevel with a given value
     *
     * The attribute estimatedLevel maps the field estimated_level defined as int.<br>
     * Comment for field estimated_level: Not specified.<br>
     * @param int $estimatedLevel
     * @category Modifier
     */
    public function setEstimatedLevel($estimatedLevel)
    {
        $this->estimatedLevel = (int)$estimatedLevel;
    }

    /**
     * setPreviousEstimatedLevel Sets the class attribute previousEstimatedLevel with a given value
     *
     * The attribute previousEstimatedLevel maps the field previous_estimated_level defined as int.<br>
     * Comment for field previous_estimated_level: Not specified.<br>
     * @param int $previousEstimatedLevel
     * @category Modifier
     */
    public function setPreviousEstimatedLevel($previousEstimatedLevel)
    {
        $this->previousEstimatedLevel = (int)$previousEstimatedLevel;
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
     * getEvaluationDate gets the class attribute evaluationDate value
     *
     * The attribute evaluationDate maps the field evaluation_date defined as varchar(45).<br>
     * Comment for field evaluation_date: Not specified.
     * @return string $evaluationDate
     * @category Accessor of $evaluationDate
     */
    public function getEvaluationDate()
    {
        return $this->evaluationDate;
    }

    /**
     * getEvaluatedBy gets the class attribute evaluatedBy value
     *
     * The attribute evaluatedBy maps the field evaluated_by defined as int.<br>
     * Comment for field evaluated_by: Not specified.
     * @return int $evaluatedBy
     * @category Accessor of $evaluatedBy
     */
    public function getEvaluatedBy()
    {
        return $this->evaluatedBy;
    }

    /**
     * getEstimatedLevel gets the class attribute estimatedLevel value
     *
     * The attribute estimatedLevel maps the field estimated_level defined as int.<br>
     * Comment for field estimated_level: Not specified.
     * @return int $estimatedLevel
     * @category Accessor of $estimatedLevel
     */
    public function getEstimatedLevel()
    {
        return $this->estimatedLevel;
    }

    /**
     * getPreviousEstimatedLevel gets the class attribute previousEstimatedLevel value
     *
     * The attribute previousEstimatedLevel maps the field previous_estimated_level defined as int.<br>
     * Comment for field previous_estimated_level: Not specified.
     * @return int $previousEstimatedLevel
     * @category Accessor of $previousEstimatedLevel
     */
    public function getPreviousEstimatedLevel()
    {
        return $this->previousEstimatedLevel;
    }

    /**
     * Gets DDL SQL code of the table employees_skills
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
        return "employees_skills";
    }

    /**
     * The BeanEmployeesSkills constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEmployee
     * @param int $idSkill
     * @return BeanEmployeesSkills Object
     */
    public function __construct($idEmployee = NULL, $idSkill = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEmployee) && !empty($idSkill)) {
            $this->select($idEmployee, $idSkill);
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
     * Fetchs a table row of employees_skills into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEmployee
     * @param int $idSkill
     * @return int affected selected row
     * @category DML
     */
    public function select($idEmployee, $idSkill)
    {
        $sql = "SELECT * FROM employees_skills WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEmployee = (integer)$rowObject->id_employee;
            @$this->idSkill = (integer)$rowObject->id_skill;
            @$this->evaluationDate = $this->replaceAposBackSlash($rowObject->evaluation_date);
            @$this->evaluatedBy = (integer)$rowObject->evaluated_by;
            @$this->estimatedLevel = (integer)$rowObject->estimated_level;
            @$this->previousEstimatedLevel = (integer)$rowObject->previous_estimated_level;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table employees_skills
     * @param int $idEmployee
     * @param int $idSkill
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEmployee, $idSkill)
    {
        $sql = "DELETE FROM employees_skills WHERE id_employee={$this->parseValue($idEmployee,'int')} AND id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of employees_skills
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO employees_skills
        (id_employee,id_skill,evaluation_date,evaluated_by,estimated_level,previous_estimated_level)
        VALUES({$this->parseValue($this->idEmployee)},
			{$this->parseValue($this->idSkill)},
			{$this->parseValue($this->evaluationDate, 'notNumber')},
			{$this->parseValue($this->evaluatedBy)},
			{$this->parseValue($this->estimatedLevel)},
			{$this->parseValue($this->previousEstimatedLevel)})
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
     * Updates a specific row from the table employees_skills with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEmployee
     * @param int $idSkill
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEmployee, $idSkill)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                employees_skills
                SET 
				evaluation_date={$this->parseValue($this->evaluationDate, 'notNumber')},
				evaluated_by={$this->parseValue($this->evaluatedBy)},
				estimated_level={$this->parseValue($this->estimatedLevel)},
				previous_estimated_level={$this->parseValue($this->previousEstimatedLevel)}
            WHERE
                id_employee={$this->parseValue($idEmployee, 'int')} AND id_skill={$this->parseValue($idSkill, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEmployee, $idSkill);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of employees_skills previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEmployee) && !empty($this->idSkill)) {
            return $this->update($this->idEmployee, $this->idSkill);
        } else {
            return false;
        }
    }

}

?>
