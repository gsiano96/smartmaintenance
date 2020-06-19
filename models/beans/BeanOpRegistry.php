<?php
/**
 * Class BeanOpRegistry
 * Bean class for object oriented management of the MySQL table op_registry
 *
 * Comment of the managed table op_registry: Not specified.
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
 * @filesource BeanOpRegistry.php
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

class BeanOpRegistry extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_op of table op_registry
     *
     * Comment for field id_op: Not specified<br>
     * @var int $idOp
     */
    private $idOp;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field entity_name
     *
     * Comment for field entity_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var string $entityName
     */
    private $entityName;

    /**
     * Class attribute for mapping table field pk
     *
     * Comment for field pk: Not specified.<br>
     * Field information:
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $pk
     */
    private $pk;

    /**
     * Class attribute for mapping table field operation_type
     *
     * Comment for field operation_type: Not specified.<br>
     * Field information:
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var string $operationType
     */
    private $operationType;

    /**
     * Class attribute for mapping table field operation_date
     *
     * Comment for field operation_date: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $operationDate
     */
    private $operationDate;

    /**
     * Class attribute for mapping table field user_id
     *
     * Comment for field user_id: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var int $userId
     */
    private $userId;

    /**
     * Class attribute for storing the SQL DDL of table op_registry
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBvcF9yZWdpc3RyeWAgKAogIGBpZF9vcGAgaW50IE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBlbnRpdHlfbmFtZWAgdmFyY2hhcig0NSkgREVGQVVMVCBOVUxMLAogIGBwa2AgdmFyY2hhcig0NSkgREVGQVVMVCBOVUxMLAogIGBvcGVyYXRpb25fdHlwZWAgdmFyY2hhcig0NSkgREVGQVVMVCBOVUxMLAogIGBvcGVyYXRpb25fZGF0ZWAgZGF0ZXRpbWUgREVGQVVMVCBOVUxMLAogIGB1c2VyX2lkYCBpbnQgTk9UIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9vcGApLAogIEtFWSBgZmtfdXNlcl9vcGVyYXRvbnNfaWR4YCAoYHVzZXJfaWRgKSwKICBLRVkgYGlkeF90YWJsZWAgKGBlbnRpdHlfbmFtZWApLAogIEtFWSBgaWR4X29wZXJhdGlvbl90eXBlYCAoYG9wZXJhdGlvbl90eXBlYCksCiAgQ09OU1RSQUlOVCBgZmtfdXNlcl9vcGVyYXRpb25zYCBGT1JFSUdOIEtFWSAoYHVzZXJfaWRgKSBSRUZFUkVOQ0VTIGB1c2VyYCAoYGlkX3VzZXJgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MTc2NCBERUZBVUxUIENIQVJTRVQ9dXRmOA==";

    /**
     * setIdOp Sets the class attribute idOp with a given value
     *
     * The attribute idOp maps the field id_op defined as int.<br>
     * Comment for field id_op: Not specified.<br>
     * @param int $idOp
     * @category Modifier
     */
    public function setIdOp($idOp)
    {
        $this->idOp = (int)$idOp;
    }

    /**
     * setEntityName Sets the class attribute entityName with a given value
     *
     * The attribute entityName maps the field entity_name defined as varchar(45).<br>
     * Comment for field entity_name: Not specified.<br>
     * @param string $entityName
     * @category Modifier
     */
    public function setEntityName($entityName)
    {
        $this->entityName = (string)$entityName;
    }

    /**
     * setPk Sets the class attribute pk with a given value
     *
     * The attribute pk maps the field pk defined as varchar(45).<br>
     * Comment for field pk: Not specified.<br>
     * @param string $pk
     * @category Modifier
     */
    public function setPk($pk)
    {
        $this->pk = (string)$pk;
    }

    /**
     * setOperationType Sets the class attribute operationType with a given value
     *
     * The attribute operationType maps the field operation_type defined as varchar(45).<br>
     * Comment for field operation_type: Not specified.<br>
     * @param string $operationType
     * @category Modifier
     */
    public function setOperationType($operationType)
    {
        $this->operationType = (string)$operationType;
    }

    /**
     * setOperationDate Sets the class attribute operationDate with a given value
     *
     * The attribute operationDate maps the field operation_date defined as datetime.<br>
     * Comment for field operation_date: Not specified.<br>
     * @param string $operationDate
     * @category Modifier
     */
    public function setOperationDate($operationDate)
    {
        $this->operationDate = (string)$operationDate;
    }

    /**
     * setUserId Sets the class attribute userId with a given value
     *
     * The attribute userId maps the field user_id defined as int.<br>
     * Comment for field user_id: Not specified.<br>
     * @param int $userId
     * @category Modifier
     */
    public function setUserId($userId)
    {
        $this->userId = (int)$userId;
    }

    /**
     * getIdOp gets the class attribute idOp value
     *
     * The attribute idOp maps the field id_op defined as int.<br>
     * Comment for field id_op: Not specified.
     * @return int $idOp
     * @category Accessor of $idOp
     */
    public function getIdOp()
    {
        return $this->idOp;
    }

    /**
     * getEntityName gets the class attribute entityName value
     *
     * The attribute entityName maps the field entity_name defined as varchar(45).<br>
     * Comment for field entity_name: Not specified.
     * @return string $entityName
     * @category Accessor of $entityName
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * getPk gets the class attribute pk value
     *
     * The attribute pk maps the field pk defined as varchar(45).<br>
     * Comment for field pk: Not specified.
     * @return string $pk
     * @category Accessor of $pk
     */
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * getOperationType gets the class attribute operationType value
     *
     * The attribute operationType maps the field operation_type defined as varchar(45).<br>
     * Comment for field operation_type: Not specified.
     * @return string $operationType
     * @category Accessor of $operationType
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * getOperationDate gets the class attribute operationDate value
     *
     * The attribute operationDate maps the field operation_date defined as datetime.<br>
     * Comment for field operation_date: Not specified.
     * @return string $operationDate
     * @category Accessor of $operationDate
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * getUserId gets the class attribute userId value
     *
     * The attribute userId maps the field user_id defined as int.<br>
     * Comment for field user_id: Not specified.
     * @return int $userId
     * @category Accessor of $userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Gets DDL SQL code of the table op_registry
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
        return "op_registry";
    }

    /**
     * The BeanOpRegistry constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idOp is given.
     *  - with a fetched data row from the table op_registry having id_op=$idOp
     * @param int $idOp . If omitted an empty (not fetched) instance is created.
     * @return BeanOpRegistry Object
     */
    public function __construct($idOp = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idOp)) {
            $this->select($idOp);
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
     * Fetchs a table row of op_registry into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idOp the primary key id_op value of table op_registry which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idOp)
    {
        $sql = "SELECT * FROM op_registry WHERE id_op={$this->parseValue($idOp,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idOp = (integer)$rowObject->id_op;
            @$this->entityName = $this->replaceAposBackSlash($rowObject->entity_name);
            @$this->pk = $this->replaceAposBackSlash($rowObject->pk);
            @$this->operationType = $this->replaceAposBackSlash($rowObject->operation_type);
            @$this->operationDate = empty($rowObject->operation_date) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->operation_date));
            @$this->userId = (integer)$rowObject->user_id;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table op_registry
     * @param int $idOp the primary key id_op value of table op_registry which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idOp)
    {
        $sql = "DELETE FROM op_registry WHERE id_op={$this->parseValue($idOp,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of op_registry
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idOp = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO op_registry
            (entity_name,pk,operation_type,operation_date,user_id)
            VALUES(
			{$this->parseValue($this->entityName, 'notNumber')},
			{$this->parseValue($this->pk, 'notNumber')},
			{$this->parseValue($this->operationType, 'notNumber')},
			{$this->parseValue($this->operationDate, 'datetime')},
			{$this->parseValue($this->userId)})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idOp = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table op_registry with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idOp the primary key id_op value of table op_registry which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idOp)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                op_registry
            SET 
				entity_name={$this->parseValue($this->entityName, 'notNumber')},
				pk={$this->parseValue($this->pk, 'notNumber')},
				operation_type={$this->parseValue($this->operationType, 'notNumber')},
				operation_date={$this->parseValue($this->operationDate, 'datetime')},
				user_id={$this->parseValue($this->userId)}
            WHERE
                id_op={$this->parseValue($idOp, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idOp);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of op_registry previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idOp != "") {
            return $this->update($this->idOp);
        } else {
            return false;
        }
    }

}

?>
