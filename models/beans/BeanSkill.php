<?php
/**
 * Class BeanSkill
 * Bean class for object oriented management of the MySQL table skill
 *
 * Comment of the managed table skill: Not specified.
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
 * @filesource BeanSkill.php
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

class BeanSkill extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_skill of table skill
     *
     * Comment for field id_skill: Not specified<br>
     * @var int $idSkill
     */
    private $idSkill;

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
     *  - Data type: varchar(50)
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
     *  - Data type: varchar(200)
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
     *  - Data type: tinyint
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $enabled
     */
    private $enabled;

    /**
     * Class attribute for storing the SQL DDL of table skill
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBza2lsbGAgKAogIGBpZF9za2lsbGAgaW50IE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBuYW1lYCB2YXJjaGFyKDUwKSBOT1QgTlVMTCwKICBgZGVzY3JpcHRpb25gIHZhcmNoYXIoMjAwKSBERUZBVUxUIE5VTEwsCiAgYGVuYWJsZWRgIHRpbnlpbnQgREVGQVVMVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRfc2tpbGxgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9NTE0IERFRkFVTFQgQ0hBUlNFVD11dGY4";

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
     * setName Sets the class attribute name with a given value
     *
     * The attribute name maps the field name defined as varchar(50).<br>
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
     * The attribute description maps the field description defined as varchar(200).<br>
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
     * The attribute enabled maps the field enabled defined as tinyint.<br>
     * Comment for field enabled: Not specified.<br>
     * @param int $enabled
     * @category Modifier
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (int)$enabled;
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
     * getName gets the class attribute name value
     *
     * The attribute name maps the field name defined as varchar(50).<br>
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
     * The attribute description maps the field description defined as varchar(200).<br>
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
     * The attribute enabled maps the field enabled defined as tinyint.<br>
     * Comment for field enabled: Not specified.
     * @return int $enabled
     * @category Accessor of $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Gets DDL SQL code of the table skill
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
        return "skill";
    }

    /**
     * The BeanSkill constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idSkill is given.
     *  - with a fetched data row from the table skill having id_skill=$idSkill
     * @param int $idSkill . If omitted an empty (not fetched) instance is created.
     * @return BeanSkill Object
     */
    public function __construct($idSkill = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idSkill)) {
            $this->select($idSkill);
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
     * Fetchs a table row of skill into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idSkill the primary key id_skill value of table skill which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idSkill)
    {
        $sql = "SELECT * FROM skill WHERE id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idSkill = (integer)$rowObject->id_skill;
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            @$this->description = $this->replaceAposBackSlash($rowObject->description);
            @$this->enabled = (integer)$rowObject->enabled;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table skill
     * @param int $idSkill the primary key id_skill value of table skill which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idSkill)
    {
        $sql = "DELETE FROM skill WHERE id_skill={$this->parseValue($idSkill,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of skill
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idSkill = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO skill
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
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idSkill = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table skill with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idSkill the primary key id_skill value of table skill which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idSkill)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                skill
            SET 
				name={$this->parseValue($this->name, 'notNumber')},
				description={$this->parseValue($this->description, 'notNumber')},
				enabled={$this->parseValue($this->enabled)}
            WHERE
                id_skill={$this->parseValue($idSkill, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idSkill);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of skill previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idSkill != "") {
            return $this->update($this->idSkill);
        } else {
            return false;
        }
    }

}

?>
