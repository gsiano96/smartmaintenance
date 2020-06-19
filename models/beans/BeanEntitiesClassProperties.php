<?php
/**
 * Class BeanEntitiesClassProperties
 * Bean class for object oriented management of the MySQL table entities_class_properties
 *
 * Comment of the managed table entities_class_properties: Not specified.
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
 * @filesource BeanEntitiesClassProperties.php
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


class BeanEntitiesClassProperties extends MySqlRecord
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
     * Class attribute for mapping table field id_entity_class
     *
     * Comment for field id_entity_class: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idEntityClass
     */
    private $idEntityClass;

    /**
     * Class attribute for mapping table field id_property
     *
     * Comment for field id_property: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idProperty
     */
    private $idProperty;

    /**
     * Class attribute for storing the SQL DDL of table entities_class_properties
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbnRpdGllc19jbGFzc19wcm9wZXJ0aWVzYCAoCiAgYGlkX2VudGl0eV9jbGFzc2AgaW50IE5PVCBOVUxMLAogIGBpZF9wcm9wZXJ0eWAgaW50IE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRfZW50aXR5X2NsYXNzYCxgaWRfcHJvcGVydHlgKSwKICBLRVkgYGZrX3Byb3BlcnR5X2hhc19lbnRpdHlfY2xhc3NfZW50aXR5X2NsYXNzMV9pZHhgIChgaWRfZW50aXR5X2NsYXNzYCksCiAgS0VZIGBma19wcm9wZXJ0eV9oYXNfZW50aXR5X2NsYXNzX3Byb3BlcnR5MV9pZHhgIChgaWRfcHJvcGVydHlgKSwKICBDT05TVFJBSU5UIGBma19wcm9wZXJ0eV9oYXNfZW50aXR5X2NsYXNzX2VudGl0eV9jbGFzczFgIEZPUkVJR04gS0VZIChgaWRfZW50aXR5X2NsYXNzYCkgUkVGRVJFTkNFUyBgZW50aXR5X2NsYXNzYCAoYGlkX2VudGl0eV9jbGFzc2ApLAogIENPTlNUUkFJTlQgYGZrX3Byb3BlcnR5X2hhc19lbnRpdHlfY2xhc3NfcHJvcGVydHkxYCBGT1JFSUdOIEtFWSAoYGlkX3Byb3BlcnR5YCkgUkVGRVJFTkNFUyBgcHJvcGVydHlgIChgaWRfcHJvcGVydHlgKQopIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0Zjg=";

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
     * Gets DDL SQL code of the table entities_class_properties
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
        return "entities_class_properties";
    }

    /**
     * The BeanEntitiesClassProperties constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEntityClass
     * @param int $idProperty
     * @return BeanEntitiesClassProperties Object
     */
    public function __construct($idEntityClass = NULL, $idProperty = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEntityClass) && !empty($idProperty)) {
            $this->select($idEntityClass, $idProperty);
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
     * Fetchs a table row of entities_class_properties into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEntityClass
     * @param int $idProperty
     * @return int affected selected row
     * @category DML
     */
    public function select($idEntityClass, $idProperty)
    {
        $sql = "SELECT * FROM entities_class_properties WHERE id_entity_class={$this->parseValue($idEntityClass,'int')} AND id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEntityClass = (integer)$rowObject->id_entity_class;
            @$this->idProperty = (integer)$rowObject->id_property;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table entities_class_properties
     * @param int $idEntityClass
     * @param int $idProperty
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEntityClass, $idProperty)
    {
        $sql = "DELETE FROM entities_class_properties WHERE id_entity_class={$this->parseValue($idEntityClass,'int')} AND id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of entities_class_properties
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO entities_class_properties
        (id_entity_class,id_property)
        VALUES({$this->parseValue($this->idEntityClass)},
			{$this->parseValue($this->idProperty)})
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
     * Updates a specific row from the table entities_class_properties with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEntityClass
     * @param int $idProperty
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEntityClass, $idProperty)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                entities_class_properties
                SET 
            WHERE
                id_entity_class={$this->parseValue($idEntityClass, 'int')} AND id_property={$this->parseValue($idProperty, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEntityClass, $idProperty);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of entities_class_properties previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEntityClass) && !empty($this->idProperty)) {
            return $this->update($this->idEntityClass, $this->idProperty);
        } else {
            return false;
        }
    }

}

?>
