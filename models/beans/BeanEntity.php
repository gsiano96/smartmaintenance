<?php
/**
 * Class BeanEntity
 * Bean class for object oriented management of the MySQL table entity
 *
 * Comment of the managed table entity: Not specified.
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
 * @filesource BeanEntity.php
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

class BeanEntity extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_entity of table entity
     *
     * Comment for field id_entity: Not specified<br>
     * @var int $idEntity
     */
    private $idEntity;

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
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $name
     */
    private $name;

    /**
     * Class attribute for mapping table field id_entity_class
     *
     * Comment for field id_entity_class: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $idEntityClass
     */
    private $idEntityClass;

    /**
     * Class attribute for storing the SQL DDL of table entity
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbnRpdHlgICgKICBgaWRfZW50aXR5YCBpbnQgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYG5hbWVgIHZhcmNoYXIoNDUpIERFRkFVTFQgTlVMTCwKICBgaWRfZW50aXR5X2NsYXNzYCBpbnQgTk9UIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9lbnRpdHlgKSwKICBLRVkgYGZrX2VudGl0eV9lbnRpdHlfY2xhc3MxX2lkeGAgKGBpZF9lbnRpdHlfY2xhc3NgKSwKICBDT05TVFJBSU5UIGBma19lbnRpdHlfZW50aXR5X2NsYXNzMWAgRk9SRUlHTiBLRVkgKGBpZF9lbnRpdHlfY2xhc3NgKSBSRUZFUkVOQ0VTIGBlbnRpdHlfY2xhc3NgIChgaWRfZW50aXR5X2NsYXNzYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTI0IERFRkFVTFQgQ0hBUlNFVD11dGY4";

    /**
     * setIdEntity Sets the class attribute idEntity with a given value
     *
     * The attribute idEntity maps the field id_entity defined as int.<br>
     * Comment for field id_entity: Not specified.<br>
     * @param int $idEntity
     * @category Modifier
     */
    public function setIdEntity($idEntity)
    {
        $this->idEntity = (int)$idEntity;
    }

    /**
     * setName Sets the class attribute name with a given value
     *
     * The attribute name maps the field name defined as varchar(45).<br>
     * Comment for field name: Not specified.<br>
     * @param string $name
     * @category Modifier
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * setIdEntityClass Sets the class attribute idEntityClass with a given value
     *
     * The attribute idEntityClass maps the field id_entity_class defined as int.<br>
     * Comment for field id_entity_class: Not specified.<br>
     * @param int $idEntityClass
     * @category Modifier
     */
    public function setIdEntityClass($idEntityClass)
    {
        $this->idEntityClass = (int)$idEntityClass;
    }

    /**
     * getIdEntity gets the class attribute idEntity value
     *
     * The attribute idEntity maps the field id_entity defined as int.<br>
     * Comment for field id_entity: Not specified.
     * @return int $idEntity
     * @category Accessor of $idEntity
     */
    public function getIdEntity()
    {
        return $this->idEntity;
    }

    /**
     * getName gets the class attribute name value
     *
     * The attribute name maps the field name defined as varchar(45).<br>
     * Comment for field name: Not specified.
     * @return string $name
     * @category Accessor of $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getIdEntityClass gets the class attribute idEntityClass value
     *
     * The attribute idEntityClass maps the field id_entity_class defined as int.<br>
     * Comment for field id_entity_class: Not specified.
     * @return int $idEntityClass
     * @category Accessor of $idEntityClass
     */
    public function getIdEntityClass()
    {
        return $this->idEntityClass;
    }

    /**
     * Gets DDL SQL code of the table entity
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
        return "entity";
    }

    /**
     * The BeanEntity constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idEntity is given.
     *  - with a fetched data row from the table entity having id_entity=$idEntity
     * @param int $idEntity . If omitted an empty (not fetched) instance is created.
     * @return BeanEntity Object
     */
    public function __construct($idEntity = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEntity)) {
            $this->select($idEntity);
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
     * Fetchs a table row of entity into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEntity the primary key id_entity value of table entity which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idEntity)
    {
        $sql = "SELECT * FROM entity WHERE id_entity={$this->parseValue($idEntity,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEntity = (integer)$rowObject->id_entity;
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            @$this->idEntityClass = (integer)$rowObject->id_entity_class;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table entity
     * @param int $idEntity the primary key id_entity value of table entity which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEntity)
    {
        $sql = "DELETE FROM entity WHERE id_entity={$this->parseValue($idEntity,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of entity
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idEntity = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO entity
            (name,id_entity_class)
            VALUES(
			{$this->parseValue($this->name, 'notNumber')},
			{$this->parseValue($this->idEntityClass)})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idEntity = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table entity with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEntity the primary key id_entity value of table entity which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEntity)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                entity
            SET 
				name={$this->parseValue($this->name, 'notNumber')},
				id_entity_class={$this->parseValue($this->idEntityClass)}
            WHERE
                id_entity={$this->parseValue($idEntity, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($idEntity);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of entity previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idEntity != "") {
            return $this->update($this->idEntity);
        } else {
            return false;
        }
    }

}
?>
