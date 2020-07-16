<?php
/**
 * Class BeanJobsSkills
 * Bean class for object oriented management of the MySQL table jobs_skills
 *
 * Comment of the managed table jobs_skills: Skills requirements for each jobs.
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
 * @filesource BeanJobsSkills.php
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


class BeanJobsSkills extends MySqlRecord
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
     * Class attribute for mapping table field expected_level
     *
     * Comment for field expected_level: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default: 1
     *  - Extra:
     * @var int $expectedLevel
     */
    private $expectedLevel;

    /**
     * Class attribute for storing the SQL DDL of table jobs_skills
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBqb2JzX3NraWxsc2AgKAogIGBpZF9za2lsbGAgaW50IE5PVCBOVUxMLAogIGBpZF9qb2JgIGludCBOT1QgTlVMTCwKICBgZXhwZWN0ZWRfbGV2ZWxgIGludCBOT1QgTlVMTCBERUZBVUxUICcxJywKICBQUklNQVJZIEtFWSAoYGlkX3NraWxsYCxgaWRfam9iYCksCiAgS0VZIGBma19tYW5zaW9uaV9jb21wZXRlbnplX2NvbXBldGVuemExX2lkeGAgKGBpZF9za2lsbGApLAogIEtFWSBgZmtfam9ic19za2lsbHNfam9iMV9pZHhgIChgaWRfam9iYCksCiAgQ09OU1RSQUlOVCBgZmtfam9ic19za2lsbHNfam9iMWAgRk9SRUlHTiBLRVkgKGBpZF9qb2JgKSBSRUZFUkVOQ0VTIGBqb2JgIChgaWRfam9iYCksCiAgQ09OU1RSQUlOVCBgZmtfbWFuc2lvbmlfY29tcGV0ZW56ZV9jb21wZXRlbnphMWAgRk9SRUlHTiBLRVkgKGBpZF9za2lsbGApIFJFRkVSRU5DRVMgYHNraWxsYCAoYGlkX3NraWxsYCkKKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J1NraWxscyByZXF1aXJlbWVudHMgZm9yIGVhY2ggam9icyc=";

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
     * setExpectedLevel Sets the class attribute expectedLevel with a given value
     *
     * The attribute expectedLevel maps the field expected_level defined as int.<br>
     * Comment for field expected_level: Not specified.<br>
     * @param int $expectedLevel
     * @category Modifier
     */
    public function setExpectedLevel($expectedLevel)
    {
        $this->expectedLevel = (int)$expectedLevel;
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
     * getExpectedLevel gets the class attribute expectedLevel value
     *
     * The attribute expectedLevel maps the field expected_level defined as int.<br>
     * Comment for field expected_level: Not specified.
     * @return int $expectedLevel
     * @category Accessor of $expectedLevel
     */
    public function getExpectedLevel()
    {
        return $this->expectedLevel;
    }

    /**
     * Gets DDL SQL code of the table jobs_skills
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
        return "jobs_skills";
    }

    /**
     * The BeanJobsSkills constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idSkill
     * @param int $idJob
     * @return BeanJobsSkills Object
     */
    public function __construct($idSkill = NULL, $idJob = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idSkill) && !empty($idJob)) {
            $this->select($idSkill, $idJob);
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
     * Fetchs a table row of jobs_skills into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idSkill
     * @param int $idJob
     * @return int affected selected row
     * @category DML
     */
    public function select($idSkill, $idJob)
    {
        $sql = "SELECT * FROM jobs_skills WHERE id_skill={$this->parseValue($idSkill,'int')} AND id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idSkill = (integer)$rowObject->id_skill;
            @$this->idJob = (integer)$rowObject->id_job;
            @$this->expectedLevel = (integer)$rowObject->expected_level;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
    return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table jobs_skills
     * @param int $idSkill
     * @param int $idJob
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idSkill, $idJob)
    {
        $sql = "DELETE FROM jobs_skills WHERE id_skill={$this->parseValue($idSkill,'int')} AND id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of jobs_skills
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO jobs_skills
        (id_skill,id_job,expected_level)
        VALUES({$this->parseValue($this->idSkill)},
			{$this->parseValue($this->idJob)},
			{$this->parseValue($this->expectedLevel)})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
        }
        return $result;
    }

    /**
     * Updates a specific row from the table jobs_skills with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idSkill
     * @param int $idJob
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idSkill, $idJob)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                jobs_skills
                SET 
				expected_level={$this->parseValue($this->expectedLevel)}
            WHERE
                id_skill={$this->parseValue($idSkill, 'int')} AND id_job={$this->parseValue($idJob, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            }   else {
                $this->select($idSkill, $idJob);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of jobs_skills previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idSkill) && !empty($this->idJob)) {
            return $this->update($this->idSkill, $this->idJob);
        } else {
            return false;
        }
    }

}
?>
