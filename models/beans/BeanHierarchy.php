<?php
/**
 * Class BeanHierarchy
 * Bean class for object oriented management of the MySQL table hierarchy
 *
 * Comment of the managed table hierarchy: Not specified.
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
 * @filesource BeanHierarchy.php
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


class BeanHierarchy extends MySqlRecord
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
     * Class attribute for mapping table field id_parent
     *
     * Comment for field id_parent: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idParent
     */
    private $idParent;

    /**
     * Class attribute for storing the SQL DDL of table hierarchy
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBoaWVyYXJjaHlgICgKICBgaWRfZW50aXR5YCBpbnQgTk9UIE5VTEwsCiAgYGlkX3BhcmVudGAgaW50IE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRfZW50aXR5YCxgaWRfcGFyZW50YCksCiAgS0VZIGBma19waXBwb19lbnRpdHkyX2lkeGAgKGBpZF9wYXJlbnRgKSwKICBDT05TVFJBSU5UIGBma19waXBwb19lbnRpdHkxYCBGT1JFSUdOIEtFWSAoYGlkX2VudGl0eWApIFJFRkVSRU5DRVMgYGVudGl0eWAgKGBpZF9lbnRpdHlgKSwKICBDT05TVFJBSU5UIGBma19waXBwb19lbnRpdHkyYCBGT1JFSUdOIEtFWSAoYGlkX3BhcmVudGApIFJFRkVSRU5DRVMgYGVudGl0eWAgKGBpZF9lbnRpdHlgKQopIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0Zjg=";

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
     * setIdParent Sets the class attribute idParent with a given value
     *
     * The attribute idParent maps the field id_parent defined as int.<br>
     * Comment for field id_parent: Not specified.<br>
     * @param int $idParent
     * @category Modifier
     */
    public function setIdParent($idParent)
    {
        $this->idParent = (int)$idParent;
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
     * getIdParent gets the class attribute idParent value
     *
     * The attribute idParent maps the field id_parent defined as int.<br>
     * Comment for field id_parent: Not specified.
     * @return int $idParent
     * @category Accessor of $idParent
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * Gets DDL SQL code of the table hierarchy
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
        return "hierarchy";
    }

    /**
     * The BeanHierarchy constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idEntity
     * @param int $idParent
     * @return BeanHierarchy Object
     */
    public function __construct($idEntity = NULL, $idParent = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEntity) && !empty($idParent)) {
            $this->select($idEntity, $idParent);
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
     * Fetchs a table row of hierarchy into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEntity
     * @param int $idParent
     * @return int affected selected row
     * @category DML
     */
    public function select($idEntity, $idParent)
    {
        $sql = "SELECT * FROM hierarchy WHERE id_entity={$this->parseValue($idEntity,'int')} AND id_parent={$this->parseValue($idParent,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEntity = (integer)$rowObject->id_entity;
            @$this->idParent = (integer)$rowObject->id_parent;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table hierarchy
     * @param int $idEntity
     * @param int $idParent
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEntity, $idParent)
    {
        $sql = "DELETE FROM hierarchy WHERE id_entity={$this->parseValue($idEntity,'int')} AND id_parent={$this->parseValue($idParent,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of hierarchy
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO hierarchy
        (id_entity,id_parent)
        VALUES({$this->parseValue($this->idEntity)},
			{$this->parseValue($this->idParent)})
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
     * Updates a specific row from the table hierarchy with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEntity
     * @param int $idParent
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEntity, $idParent)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                hierarchy
                SET 
            WHERE
                id_entity={$this->parseValue($idEntity, 'int')} AND id_parent={$this->parseValue($idParent, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEntity, $idParent);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of hierarchy previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idEntity) && !empty($this->idParent)) {
            return $this->update($this->idEntity, $this->idParent);
        } else {
            return false;
        }
    }

}

?>
