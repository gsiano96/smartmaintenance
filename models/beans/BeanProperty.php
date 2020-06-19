<?php
/**
 * Class BeanProperty
 * Bean class for object oriented management of the MySQL table property
 *
 * Comment of the managed table property: Not specified.
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
 * @filesource BeanProperty.php
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

class BeanProperty extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_property of table property
     *
     * Comment for field id_property: Not specified<br>
     * @var int $idProperty
     */
    private $idProperty;

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
     * Class attribute for storing the SQL DDL of table property
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBwcm9wZXJ0eWAgKAogIGBpZF9wcm9wZXJ0eWAgaW50IE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBuYW1lYCB2YXJjaGFyKDQ1KSBERUZBVUxUIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9wcm9wZXJ0eWApCikgRU5HSU5FPUlubm9EQiBBVVRPX0lOQ1JFTUVOVD0yNSBERUZBVUxUIENIQVJTRVQ9dXRmOA==";

    /**
     * setIdProperty Sets the class attribute idProperty with a given value
     *
     * The attribute idProperty maps the field id_property defined as int.<br>
     * Comment for field id_property: Not specified.<br>
     * @param int $idProperty
     * @category Modifier
     */
    public function setIdProperty($idProperty)
    {
        $this->idProperty = (int)$idProperty;
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
     * getIdProperty gets the class attribute idProperty value
     *
     * The attribute idProperty maps the field id_property defined as int.<br>
     * Comment for field id_property: Not specified.
     * @return int $idProperty
     * @category Accessor of $idProperty
     */
    public function getIdProperty()
    {
        return $this->idProperty;
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
     * Gets DDL SQL code of the table property
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
        return "property";
    }

    /**
     * The BeanProperty constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idProperty is given.
     *  - with a fetched data row from the table property having id_property=$idProperty
     * @param int $idProperty . If omitted an empty (not fetched) instance is created.
     * @return BeanProperty Object
     */
    public function __construct($idProperty = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idProperty)) {
            $this->select($idProperty);
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
     * Fetchs a table row of property into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idProperty the primary key id_property value of table property which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idProperty)
    {
        $sql = "SELECT * FROM property WHERE id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idProperty = (integer)$rowObject->id_property;
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table property
     * @param int $idProperty the primary key id_property value of table property which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idProperty)
    {
        $sql = "DELETE FROM property WHERE id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of property
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idProperty = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO property
            (name)
            VALUES(
			{$this->parseValue($this->name,'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idProperty = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table property with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idProperty the primary key id_property value of table property which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idProperty)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                property
            SET 
				name={$this->parseValue($this->name, 'notNumber')}
            WHERE
                id_property={$this->parseValue($idProperty, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($idProperty);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of property previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idProperty != "") {
            return $this->update($this->idProperty);
        } else {
            return false;
        }
    }

}
?>
