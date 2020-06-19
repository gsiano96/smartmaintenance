<?php
/**
 * Class BeanSkillsMaintenanceProcedures
 * Bean class for object oriented management of the MySQL table skills_maintenance_procedures
 *
 * Comment of the managed table skills_maintenance_procedures: Not specified.
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
 * @filesource BeanSkillsMaintenanceProcedures.php
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


class BeanSkillsMaintenanceProcedures extends MySqlRecord
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
     * Class attribute for storing the SQL DDL of table skills_maintenance_procedures
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBza2lsbHNfbWFpbnRlbmFuY2VfcHJvY2VkdXJlc2AgKAogIGBpZF9tYWludGVuYW5jZV9wcm9jZWR1cmVgIGludCBOT1QgTlVMTCwKICBgaWRfc2tpbGxgIGludCBOT1QgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkX21haW50ZW5hbmNlX3Byb2NlZHVyZWAsYGlkX3NraWxsYCksCiAgS0VZIGBma19za2lsbHNfaWR4YCAoYGlkX3NraWxsYCksCiAgQ09OU1RSQUlOVCBgZmtfbWFpbnRlbmFuY2VfcHJvY2VkdXJlc19za2lsbHNgIEZPUkVJR04gS0VZIChgaWRfbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCkgUkVGRVJFTkNFUyBgbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCAoYGlkX2FjdGl2aXR5YCksCiAgQ09OU1RSQUlOVCBgZmtfc2tpbGxzX21haW50ZW5hbmNlX3Byb2NlZHVyZXNgIEZPUkVJR04gS0VZIChgaWRfc2tpbGxgKSBSRUZFUkVOQ0VTIGBza2lsbGAgKGBpZF9za2lsbGApCikgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmOA==";

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
     * Gets DDL SQL code of the table skills_maintenance_procedures
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
        return "skills_maintenance_procedures";
    }

    /**
     * The BeanSkillsMaintenanceProcedures constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idMaintenanceProcedure
     * @param int $idSkill
     * @return BeanSkillsMaintenanceProcedures Object
     */
    public function __construct($idMaintenanceProcedure = NULL, $idSkill = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idMaintenanceProcedure) && !empty($idSkill)) {
            $this->select($idMaintenanceProcedure, $idSkill);
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
     * Fetchs a table row of skills_maintenance_procedures into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idMaintenanceProcedure
     * @param int $idSkill
     * @return int affected selected row
     * @category DML
     */
    public function select($idMaintenanceProcedure, $idSkill)
    {
        $sql = "SELECT * FROM skills_maintenance_procedures WHERE id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')} AND id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idMaintenanceProcedure = (integer)$rowObject->id_maintenance_procedure;
            @$this->idSkill = (integer)$rowObject->id_skill;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table skills_maintenance_procedures
     * @param int $idMaintenanceProcedure
     * @param int $idSkill
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idMaintenanceProcedure, $idSkill)
    {
        $sql = "DELETE FROM skills_maintenance_procedures WHERE id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')} AND id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of skills_maintenance_procedures
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO skills_maintenance_procedures
        (id_maintenance_procedure,id_skill)
        VALUES({$this->parseValue($this->idMaintenanceProcedure)},
			{$this->parseValue($this->idSkill)})
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
     * Updates a specific row from the table skills_maintenance_procedures with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idMaintenanceProcedure
     * @param int $idSkill
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idMaintenanceProcedure, $idSkill)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                skills_maintenance_procedures
                SET 
            WHERE
                id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure, 'int')} AND id_skill={$this->parseValue($idSkill, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idMaintenanceProcedure, $idSkill);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of skills_maintenance_procedures previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idMaintenanceProcedure) && !empty($this->idSkill)) {
            return $this->update($this->idMaintenanceProcedure, $this->idSkill);
        } else {
            return false;
        }
    }

}

?>
