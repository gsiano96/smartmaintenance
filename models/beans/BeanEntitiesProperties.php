<?php
/**
 * Class BeanEntitiesProperties
 * Bean class for object oriented management of the MySQL table entities_properties
 *
 * Comment of the managed table entities_properties: Not specified.
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
 * @filesource BeanEntitiesProperties.php
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


class BeanEntitiesProperties extends MySqlRecord
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
     * Class attribute for mapping table field id_entity
     *
     * Comment for field id_entity: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idEntity
     */
    private $idEntity;

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
     * Class attribute for mapping table field value
     *
     * Comment for field value: Not specified.<br>
     * Field information:
     *  - Data type: varchar(450)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $value
     */
    private $value;

    /**
     * Class attribute for storing the SQL DDL of table entities_properties
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbnRpdGllc19wcm9wZXJ0aWVzYCAoCiAgYGlkX2VudGl0eWAgaW50IE5PVCBOVUxMLAogIGBpZF9wcm9wZXJ0eWAgaW50IE5PVCBOVUxMLAogIGB2YWx1ZWAgdmFyY2hhcig0NTApIENIQVJBQ1RFUiBTRVQgdXRmOCBDT0xMQVRFIHV0ZjhfZ2VuZXJhbF9jaSBERUZBVUxUIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9lbnRpdHlgLGBpZF9wcm9wZXJ0eWApLAogIEtFWSBgZmtfcHJvcGVydHlfaGFzX2VudGl0eV9lbnRpdHkxX2lkeGAgKGBpZF9lbnRpdHlgKSwKICBLRVkgYGZrX3Byb3BlcnR5X2hhc19lbnRpdHlfcHJvcGVydHkxX2lkeGAgKGBpZF9wcm9wZXJ0eWApLAogIENPTlNUUkFJTlQgYGZrX3Byb3BlcnR5X2hhc19lbnRpdHlfZW50aXR5MWAgRk9SRUlHTiBLRVkgKGBpZF9lbnRpdHlgKSBSRUZFUkVOQ0VTIGBlbnRpdHlgIChgaWRfZW50aXR5YCksCiAgQ09OU1RSQUlOVCBgZmtfcHJvcGVydHlfaGFzX2VudGl0eV9wcm9wZXJ0eTFgIEZPUkVJR04gS0VZIChgaWRfcHJvcGVydHlgKSBSRUZFUkVOQ0VTIGBwcm9wZXJ0eWAgKGBpZF9wcm9wZXJ0eWApCikgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmOA==";

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
     * setValue Sets the class attribute value with a given value
     *
     * The attribute value maps the field value defined as varchar(450).<br>
     * Comment for field value: Not specified.<br>
     * @param string $value
     * @category Modifier
     */
    public function setValue($value)
    {
        $this->value = (string)$value;
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
     * getValue gets the class attribute value value
     *
     * The attribute value maps the field value defined as varchar(450).<br>
     * Comment for field value: Not specified.
     * @return string $value
     * @category Accessor of $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Gets DDL SQL code of the table entities_properties
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
        return "entities_properties";
    }

    /**
     * The BeanEntitiesProperties constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEntity
     * @param int $idProperty
     * @return BeanEntitiesProperties Object
     */
    public function __construct($idEntity = NULL, $idProperty = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEntity) && !empty($idProperty)) {
            $this->select($idEntity, $idProperty);
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
     * Fetchs a table row of entities_properties into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEntity
     * @param int $idProperty
     * @return int affected selected row
     * @category DML
     */
    public function select($idEntity, $idProperty)
    {
        $sql = "SELECT * FROM entities_properties WHERE id_entity={$this->parseValue($idEntity,'int')} AND id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEntity = (integer)$rowObject->id_entity;
            @$this->idProperty = (integer)$rowObject->id_property;
            @$this->value = $this->replaceAposBackSlash($rowObject->value);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
    return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table entities_properties
     * @param int $idEntity
     * @param int $idProperty
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEntity, $idProperty)
    {
        $sql = "DELETE FROM entities_properties WHERE id_entity={$this->parseValue($idEntity,'int')} AND id_property={$this->parseValue($idProperty,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of entities_properties
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO entities_properties
        (id_entity,id_property,value)
        VALUES({$this->parseValue($this->idEntity)},
			{$this->parseValue($this->idProperty)},
			{$this->parseValue($this->value, 'notNumber')})
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
     * Updates a specific row from the table entities_properties with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEntity
     * @param int $idProperty
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEntity, $idProperty)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                entities_properties
                SET 
				value={$this->parseValue($this->value, 'notNumber')}
            WHERE
                id_entity={$this->parseValue($idEntity, 'int')} AND id_property={$this->parseValue($idProperty, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            }   else {
                $this->select($idEntity, $idProperty);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of entities_properties previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEntity) && !empty($this->idProperty)) {
            return $this->update($this->idEntity, $this->idProperty);
        } else {
            return false;
        }
    }

}
?>
