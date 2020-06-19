<?php
/**
 * Class BeanJob
 * Bean class for object oriented management of the MySQL table job
 *
 * Comment of the managed table job: Business Jobs .
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
 * @filesource BeanJob.php
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

class BeanJob extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_job of table job
     *
     * Comment for field id_job: Not specified<br>
     * @var int $idJob
     */
    private $idJob;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field name
     *
     * Comment for field name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(80)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $name
     */
    private $name;

    /**
     * Class attribute for mapping table field description
     *
     * Comment for field description: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $description
     */
    private $description;

    /**
     * Class attribute for mapping table field enabled
     *
     * Comment for field enabled: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index:
     *  - Default: 1
     *  - Extra:
     * @var int $enabled
     */
    private $enabled;

    /**
     * Class attribute for storing the SQL DDL of table job
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBqb2JgICgKICBgaWRfam9iYCBpbnQgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYG5hbWVgIHZhcmNoYXIoODApIE5PVCBOVUxMLAogIGBkZXNjcmlwdGlvbmAgdmFyY2hhcigxMDApIERFRkFVTFQgTlVMTCwKICBgZW5hYmxlZGAgaW50IE5PVCBOVUxMIERFRkFVTFQgJzEnLAogIFBSSU1BUlkgS0VZIChgaWRfam9iYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTE5MCBERUZBVUxUIENIQVJTRVQ9dXRmOCBDT01NRU5UPSdCdXNpbmVzcyBKb2JzICc=";

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
     * setName Sets the class attribute name with a given value
     *
     * The attribute name maps the field name defined as varchar(80).<br>
     * Comment for field name: Not specified.<br>
     * @param string $name
     * @category Modifier
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * setDescription Sets the class attribute description with a given value
     *
     * The attribute description maps the field description defined as varchar(100).<br>
     * Comment for field description: Not specified.<br>
     * @param string $description
     * @category Modifier
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;
    }

    /**
     * setEnabled Sets the class attribute enabled with a given value
     *
     * The attribute enabled maps the field enabled defined as int.<br>
     * Comment for field enabled: Not specified.<br>
     * @param int $enabled
     * @category Modifier
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (int)$enabled;
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
     * getName gets the class attribute name value
     *
     * The attribute name maps the field name defined as varchar(80).<br>
     * Comment for field name: Not specified.
     * @return string $name
     * @category Accessor of $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getDescription gets the class attribute description value
     *
     * The attribute description maps the field description defined as varchar(100).<br>
     * Comment for field description: Not specified.
     * @return string $description
     * @category Accessor of $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * getEnabled gets the class attribute enabled value
     *
     * The attribute enabled maps the field enabled defined as int.<br>
     * Comment for field enabled: Not specified.
     * @return int $enabled
     * @category Accessor of $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Gets DDL SQL code of the table job
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
        return "job";
    }

    /**
     * The BeanJob constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idJob is given.
     *  - with a fetched data row from the table job having id_job=$idJob
     * @param int $idJob . If omitted an empty (not fetched) instance is created.
     * @return BeanJob Object
     */
    public function __construct($idJob = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idJob)) {
            $this->select($idJob);
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
     * Fetchs a table row of job into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idJob the primary key id_job value of table job which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idJob)
    {
        $sql = "SELECT * FROM job WHERE id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idJob = (integer)$rowObject->id_job;
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            @$this->description = $this->replaceAposBackSlash($rowObject->description);
            @$this->enabled = (integer)$rowObject->enabled;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table job
     * @param int $idJob the primary key id_job value of table job which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idJob)
    {
        $sql = "DELETE FROM job WHERE id_job={$this->parseValue($idJob,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of job
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idJob = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO job
            (name,description,enabled)
            VALUES(
			{$this->parseValue($this->name, 'notNumber')},
			{$this->parseValue($this->description, 'notNumber')},
			{$this->parseValue($this->enabled)})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idJob = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table job with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idJob the primary key id_job value of table job which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idJob)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                job
            SET 
				name={$this->parseValue($this->name, 'notNumber')},
				description={$this->parseValue($this->description, 'notNumber')},
				enabled={$this->parseValue($this->enabled)}
            WHERE
                id_job={$this->parseValue($idJob, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($idJob);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of job previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idJob != "") {
            return $this->update($this->idJob);
        } else {
            return false;
        }
    }

}
?>
