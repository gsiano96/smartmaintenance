<?php
/**
 * Class BeanEmployee
 * Bean class for object oriented management of the MySQL table employee
 *
 * Comment of the managed table employee: Employess.
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
 * @filesource BeanEmployee.php
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

class BeanEmployee extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key id_employee of table employee
     *
     * Comment for field id_employee: Not specified<br>
     * @var int $idEmployee
     */
    private $idEmployee;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field first_name
     *
     * Comment for field first_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $firstName
     */
    private $firstName;

    /**
     * Class attribute for mapping table field last_name
     *
     * Comment for field last_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $lastName
     */
    private $lastName;

    /**
     * Class attribute for mapping table field gender
     *
     * Comment for field gender: Not specified.<br>
     * Field information:
     *  - Data type: varchar(1)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $gender
     */
    private $gender;

    /**
     * Class attribute for mapping table field birth_date
     *
     * Comment for field birth_date: Not specified.<br>
     * Field information:
     *  - Data type: string|date
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $birthDate
     */
    private $birthDate;

    /**
     * Class attribute for mapping table field birth_place
     *
     * Comment for field birth_place: Not specified.<br>
     * Field information:
     *  - Data type: varchar(45)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $birthPlace
     */
    private $birthPlace;

    /**
     * Class attribute for mapping table field tax_code
     *
     * Comment for field tax_code: Not specified.<br>
     * Field information:
     *  - Data type: varchar(16)
     *  - Null : YES
     *  - DB Index: UNI
     *  - Default:
     *  - Extra:
     * @var string $taxCode
     */
    private $taxCode;

    /**
     * Class attribute for mapping table field plant
     *
     * Comment for field plant: Not specified.<br>
     * Field information:
     *  - Data type: varchar(3)
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default:
     *  - Extra:
     * @var string $plant
     */
    private $plant;

    /**
     * Class attribute for storing the SQL DDL of table employee
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBlbXBsb3llZWAgKAogIGBpZF9lbXBsb3llZWAgaW50IE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBmaXJzdF9uYW1lYCB2YXJjaGFyKDEwMCkgTk9UIE5VTEwsCiAgYGxhc3RfbmFtZWAgdmFyY2hhcigxMDApIE5PVCBOVUxMLAogIGBnZW5kZXJgIHZhcmNoYXIoMSkgREVGQVVMVCBOVUxMLAogIGBiaXJ0aF9kYXRlYCBkYXRlIERFRkFVTFQgTlVMTCwKICBgYmlydGhfcGxhY2VgIHZhcmNoYXIoNDUpIERFRkFVTFQgTlVMTCwKICBgdGF4X2NvZGVgIHZhcmNoYXIoMTYpIERFRkFVTFQgTlVMTCwKICBgcGxhbnRgIHZhcmNoYXIoMykgTk9UIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZF9lbXBsb3llZWApLAogIFVOSVFVRSBLRVkgYHVuaXF1ZV90YXhfY29kZWAgKGB0YXhfY29kZWApLAogIEtFWSBgcGxhbnRgIChgcGxhbnRgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MzgzIERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J0VtcGxveWVzcyc=";

    /**
     * setIdEmployee Sets the class attribute idEmployee with a given value
     *
     * The attribute idEmployee maps the field id_employee defined as int.<br>
     * Comment for field id_employee: Not specified.<br>
     * @param int $idEmployee
     * @category Modifier
     */
    public function setIdEmployee($idEmployee)
    {
        $this->idEmployee = (int)$idEmployee;
    }

    /**
     * setFirstName Sets the class attribute firstName with a given value
     *
     * The attribute firstName maps the field first_name defined as varchar(100).<br>
     * Comment for field first_name: Not specified.<br>
     * @param string $firstName
     * @category Modifier
     */
    public function setFirstName($firstName)
    {
        $this->firstName = (string)$firstName;
    }

    /**
     * setLastName Sets the class attribute lastName with a given value
     *
     * The attribute lastName maps the field last_name defined as varchar(100).<br>
     * Comment for field last_name: Not specified.<br>
     * @param string $lastName
     * @category Modifier
     */
    public function setLastName($lastName)
    {
        $this->lastName = (string)$lastName;
    }

    /**
     * setGender Sets the class attribute gender with a given value
     *
     * The attribute gender maps the field gender defined as varchar(1).<br>
     * Comment for field gender: Not specified.<br>
     * @param string $gender
     * @category Modifier
     */
    public function setGender($gender)
    {
        $this->gender = (string)$gender;
    }

    /**
     * setBirthDate Sets the class attribute birthDate with a given value
     *
     * The attribute birthDate maps the field birth_date defined as string|date.<br>
     * Comment for field birth_date: Not specified.<br>
     * @param string $birthDate
     * @category Modifier
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = (string)$birthDate;
    }

    /**
     * setBirthPlace Sets the class attribute birthPlace with a given value
     *
     * The attribute birthPlace maps the field birth_place defined as varchar(45).<br>
     * Comment for field birth_place: Not specified.<br>
     * @param string $birthPlace
     * @category Modifier
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = (string)$birthPlace;
    }

    /**
     * setTaxCode Sets the class attribute taxCode with a given value
     *
     * The attribute taxCode maps the field tax_code defined as varchar(16).<br>
     * Comment for field tax_code: Not specified.<br>
     * @param string $taxCode
     * @category Modifier
     */
    public function setTaxCode($taxCode)
    {
        $this->taxCode = (string)$taxCode;
    }

    /**
     * setPlant Sets the class attribute plant with a given value
     *
     * The attribute plant maps the field plant defined as varchar(3).<br>
     * Comment for field plant: Not specified.<br>
     * @param string $plant
     * @category Modifier
     */
    public function setPlant($plant)
    {
        $this->plant = (string)$plant;
    }

    /**
     * getIdEmployee gets the class attribute idEmployee value
     *
     * The attribute idEmployee maps the field id_employee defined as int.<br>
     * Comment for field id_employee: Not specified.
     * @return int $idEmployee
     * @category Accessor of $idEmployee
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * getFirstName gets the class attribute firstName value
     *
     * The attribute firstName maps the field first_name defined as varchar(100).<br>
     * Comment for field first_name: Not specified.
     * @return string $firstName
     * @category Accessor of $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * getLastName gets the class attribute lastName value
     *
     * The attribute lastName maps the field last_name defined as varchar(100).<br>
     * Comment for field last_name: Not specified.
     * @return string $lastName
     * @category Accessor of $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * getGender gets the class attribute gender value
     *
     * The attribute gender maps the field gender defined as varchar(1).<br>
     * Comment for field gender: Not specified.
     * @return string $gender
     * @category Accessor of $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * getBirthDate gets the class attribute birthDate value
     *
     * The attribute birthDate maps the field birth_date defined as string|date.<br>
     * Comment for field birth_date: Not specified.
     * @return string $birthDate
     * @category Accessor of $birthDate
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * getBirthPlace gets the class attribute birthPlace value
     *
     * The attribute birthPlace maps the field birth_place defined as varchar(45).<br>
     * Comment for field birth_place: Not specified.
     * @return string $birthPlace
     * @category Accessor of $birthPlace
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * getTaxCode gets the class attribute taxCode value
     *
     * The attribute taxCode maps the field tax_code defined as varchar(16).<br>
     * Comment for field tax_code: Not specified.
     * @return string $taxCode
     * @category Accessor of $taxCode
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * getPlant gets the class attribute plant value
     *
     * The attribute plant maps the field plant defined as varchar(3).<br>
     * Comment for field plant: Not specified.
     * @return string $plant
     * @category Accessor of $plant
     */
    public function getPlant()
    {
        return $this->plant;
    }

    /**
     * Gets DDL SQL code of the table employee
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
        return "employee";
    }

    /**
     * The BeanEmployee constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $idEmployee is given.
     *  - with a fetched data row from the table employee having id_employee=$idEmployee
     * @param int $idEmployee . If omitted an empty (not fetched) instance is created.
     * @return BeanEmployee Object
     */
    public function __construct($idEmployee = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idEmployee)) {
            $this->select($idEmployee);
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
     * Fetchs a table row of employee into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idEmployee the primary key id_employee value of table employee which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($idEmployee)
    {
        $sql = "SELECT * FROM employee WHERE id_employee={$this->parseValue($idEmployee,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idEmployee = (integer)$rowObject->id_employee;
            @$this->firstName = $this->replaceAposBackSlash($rowObject->first_name);
            @$this->lastName = $this->replaceAposBackSlash($rowObject->last_name);
            @$this->gender = $this->replaceAposBackSlash($rowObject->gender);
            @$this->birthDate = empty($rowObject->birth_date) ? null : date(FETCHED_DATE_FORMAT, strtotime($rowObject->birth_date));
            @$this->birthPlace = $this->replaceAposBackSlash($rowObject->birth_place);
            @$this->taxCode = $this->replaceAposBackSlash($rowObject->tax_code);
            @$this->plant = $this->replaceAposBackSlash($rowObject->plant);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table employee
     * @param int $idEmployee the primary key id_employee value of table employee which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idEmployee)
    {
        $sql = "DELETE FROM employee WHERE id_employee={$this->parseValue($idEmployee,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of employee
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->idEmployee = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO employee
            (first_name,last_name,gender,birth_date,birth_place,tax_code,plant)
            VALUES(
			{$this->parseValue($this->firstName, 'notNumber')},
			{$this->parseValue($this->lastName, 'notNumber')},
			{$this->parseValue($this->gender, 'notNumber')},
			{$this->parseValue($this->birthDate, 'date')},
			{$this->parseValue($this->birthPlace, 'notNumber')},
			{$this->parseValue($this->taxCode, 'notNumber')},
			{$this->parseValue($this->plant, 'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->idEmployee = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table employee with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idEmployee the primary key id_employee value of table employee which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idEmployee)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                employee
            SET 
				first_name={$this->parseValue($this->firstName, 'notNumber')},
				last_name={$this->parseValue($this->lastName, 'notNumber')},
				gender={$this->parseValue($this->gender, 'notNumber')},
				birth_date={$this->parseValue($this->birthDate, 'date')},
				birth_place={$this->parseValue($this->birthPlace, 'notNumber')},
				tax_code={$this->parseValue($this->taxCode, 'notNumber')},
				plant={$this->parseValue($this->plant, 'notNumber')}
            WHERE
                id_employee={$this->parseValue($idEmployee, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idEmployee);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of employee previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if ($this->idEmployee != "") {
            return $this->update($this->idEmployee);
        } else {
            return false;
        }
    }

}

?>
