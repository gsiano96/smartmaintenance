<?php
/**
 * Class BeanPartCategory
 * Bean class for object oriented management of the MySQL table part_category
 *
 * Comment of the managed table part_category: Product categories, market classes.
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
 * @filesource BeanPartCategory.php
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

class BeanPartCategory extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key part_category_code of table part_category
     *
     * Comment for field part_category_code: Not specified<br>
     * @var string $partCategoryCode
     */
    private $partCategoryCode;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = false;

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
     * Class attribute for storing the SQL DDL of table part_category
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBwYXJ0X2NhdGVnb3J5YCAoCiAgYHBhcnRfY2F0ZWdvcnlfY29kZWAgdmFyY2hhcigyMCkgTk9UIE5VTEwsCiAgYG5hbWVgIHZhcmNoYXIoNDUpIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYHBhcnRfY2F0ZWdvcnlfY29kZWApCikgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmOCBDT01NRU5UPSdQcm9kdWN0IGNhdGVnb3JpZXMsIG1hcmtldCBjbGFzc2VzJw==";

    /**
     * setPartCategoryCode Sets the class attribute partCategoryCode with a given value
     *
     * The attribute partCategoryCode maps the field part_category_code defined as varchar(20).<br>
     * Comment for field part_category_code: Not specified.<br>
     * @param string $partCategoryCode
     * @category Modifier
     */
    public function setPartCategoryCode($partCategoryCode)
    {
        $this->partCategoryCode = (string)$partCategoryCode;
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
     * getPartCategoryCode gets the class attribute partCategoryCode value
     *
     * The attribute partCategoryCode maps the field part_category_code defined as varchar(20).<br>
     * Comment for field part_category_code: Not specified.
     * @return string $partCategoryCode
     * @category Accessor of $partCategoryCode
     */
    public function getPartCategoryCode()
    {
        return $this->partCategoryCode;
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
     * Gets DDL SQL code of the table part_category
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
        return "part_category";
    }

    /**
     * The BeanPartCategory constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $partCategoryCode is given.
     *  - with a fetched data row from the table part_category having part_category_code=$partCategoryCode
     * @param string $partCategoryCode. If omitted an empty (not fetched) instance is created.
     * @return BeanPartCategory Object
     */
    public function __construct($partCategoryCode = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($partCategoryCode)) {
            $this->select($partCategoryCode);
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
     * Fetchs a table row of part_category into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param string $partCategoryCode the primary key part_category_code value of table part_category which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($partCategoryCode)
    {
        $sql =  "SELECT * FROM part_category WHERE part_category_code={$this->parseValue($partCategoryCode,'string')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->partCategoryCode = $this->replaceAposBackSlash($rowObject->part_category_code);
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table part_category
     * @param string $partCategoryCode the primary key part_category_code value of table part_category which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($partCategoryCode)
    {
        $sql = "DELETE FROM part_category WHERE part_category_code={$this->parseValue($partCategoryCode,'string')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of part_category
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->partCategoryCode = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO part_category
            (part_category_code,name)
            VALUES({$this->parseValue($this->partCategoryCode,'notNumber')},
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
                $this->partCategoryCode = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table part_category with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param string $partCategoryCode the primary key part_category_code value of table part_category which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($partCategoryCode)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                part_category
            SET 
				name={$this->parseValue($this->name,'notNumber')}
            WHERE
                part_category_code={$this->parseValue($partCategoryCode,'string')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($partCategoryCode);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of part_category previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function updateCurrent()
    {
        if ($this->partCategoryCode != "") {
            return $this->update($this->partCategoryCode);
        } else {
            return false;
        }
    }

}
?>
