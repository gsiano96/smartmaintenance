<?php
/**
 * Class BeanMaterialsMaintenaceProcedures
 * Bean class for object oriented management of the MySQL table materials_maintenace_procedures
 *
 * Comment of the managed table materials_maintenace_procedures: Not specified.
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
 * @filesource BeanMaterialsMaintenaceProcedures.php
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


class BeanMaterialsMaintenaceProcedures extends MySqlRecord
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
     * Class attribute for mapping table field id_material
     *
     * Comment for field id_material: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idMaterial
     */
    private $idMaterial;

    /**
     * Class attribute for mapping table field id_maintenance_procedure
     *
     * Comment for field id_maintenance_procedure: Not specified.<br>
     * Field information:
     *  - Data type: int
     *  - Null : NO
     *  - DB Index: PRI
     *  - Default:
     *  - Extra:
     * @var int $idMaintenanceProcedure
     */
    private $idMaintenanceProcedure;

    /**
     * Class attribute for storing the SQL DDL of table materials_maintenace_procedures
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBtYXRlcmlhbHNfbWFpbnRlbmFjZV9wcm9jZWR1cmVzYCAoCiAgYGlkX21hdGVyaWFsYCBpbnQgTk9UIE5VTEwsCiAgYGlkX21haW50ZW5hbmNlX3Byb2NlZHVyZWAgaW50IE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRfbWF0ZXJpYWxgLGBpZF9tYWludGVuYW5jZV9wcm9jZWR1cmVgKSwKICBLRVkgYGZrX21haW50ZW5hbmNlX3Byb2NlZHVyZXNfaWR4YCAoYGlkX21haW50ZW5hbmNlX3Byb2NlZHVyZWApLAogIENPTlNUUkFJTlQgYGZrX21haW50ZW5hbmNlX3Byb2NlZHVyZXNgIEZPUkVJR04gS0VZIChgaWRfbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCkgUkVGRVJFTkNFUyBgbWFpbnRlbmFuY2VfcHJvY2VkdXJlYCAoYGlkX2FjdGl2aXR5YCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUsCiAgQ09OU1RSQUlOVCBgZmtfbWF0ZXJpYWxzYCBGT1JFSUdOIEtFWSAoYGlkX21hdGVyaWFsYCkgUkVGRVJFTkNFUyBgbWF0ZXJpYWxgIChgaWRfbWF0ZXJpYWxgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERQopIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0Zjg=";

    /**
     * setIdMaterial Sets the class attribute idMaterial with a given value
     *
     * The attribute idMaterial maps the field id_material defined as int.<br>
     * Comment for field id_material: Not specified.<br>
     * @param int $idMaterial
     * @category Modifier
     */
    public function setIdMaterial($idMaterial)
    {
        $this->idMaterial = (int)$idMaterial;
    }

    /**
     * setIdMaintenanceProcedure Sets the class attribute idMaintenanceProcedure with a given value
     *
     * The attribute idMaintenanceProcedure maps the field id_maintenance_procedure defined as int.<br>
     * Comment for field id_maintenance_procedure: Not specified.<br>
     * @param int $idMaintenanceProcedure
     * @category Modifier
     */
    public function setIdMaintenanceProcedure($idMaintenanceProcedure)
    {
        $this->idMaintenanceProcedure = (int)$idMaintenanceProcedure;
    }

    /**
     * getIdMaterial gets the class attribute idMaterial value
     *
     * The attribute idMaterial maps the field id_material defined as int.<br>
     * Comment for field id_material: Not specified.
     * @return int $idMaterial
     * @category Accessor of $idMaterial
     */
    public function getIdMaterial()
    {
        return $this->idMaterial;
    }

    /**
     * getIdMaintenanceProcedure gets the class attribute idMaintenanceProcedure value
     *
     * The attribute idMaintenanceProcedure maps the field id_maintenance_procedure defined as int.<br>
     * Comment for field id_maintenance_procedure: Not specified.
     * @return int $idMaintenanceProcedure
     * @category Accessor of $idMaintenanceProcedure
     */
    public function getIdMaintenanceProcedure()
    {
        return $this->idMaintenanceProcedure;
    }

    /**
     * Gets DDL SQL code of the table materials_maintenace_procedures
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
        return "materials_maintenace_procedures";
    }

    /**
     * The BeanMaterialsMaintenaceProcedures constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param int $idMaterial
     * @param int $idMaintenanceProcedure
     * @return BeanMaterialsMaintenaceProcedures Object
     */
    public function __construct($idMaterial = NULL, $idMaintenanceProcedure = NULL)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($idMaterial) && !empty($idMaintenanceProcedure)) {
            $this->select($idMaterial, $idMaintenanceProcedure);
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
     * Fetchs a table row of materials_maintenace_procedures into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $idMaterial
     * @param int $idMaintenanceProcedure
     * @return int affected selected row
     * @category DML
     */
    public function select($idMaterial, $idMaintenanceProcedure)
    {
        $sql = "SELECT * FROM materials_maintenace_procedures WHERE id_material={$this->parseValue($idMaterial,'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->idMaterial = (integer)$rowObject->id_material;
            @$this->idMaintenanceProcedure = (integer)$rowObject->id_maintenance_procedure;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table materials_maintenace_procedures
     * @param int $idMaterial
     * @param int $idMaintenanceProcedure
     * @return int affected deleted row
     * @category DML
     */
    public function delete($idMaterial, $idMaintenanceProcedure)
    {
        $sql = "DELETE FROM materials_maintenace_procedures WHERE id_material={$this->parseValue($idMaterial,'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of materials_maintenace_procedures
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO materials_maintenace_procedures
        (id_material,id_maintenance_procedure)
        VALUES({$this->parseValue($this->idMaterial)},
			{$this->parseValue($this->idMaintenanceProcedure)})
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
     * Updates a specific row from the table materials_maintenace_procedures with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $idMaterial
     * @param int $idMaintenanceProcedure
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($idMaterial, $idMaintenanceProcedure)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                materials_maintenace_procedures
                SET 
            WHERE
                id_material={$this->parseValue($idMaterial, 'int')} AND id_maintenance_procedure={$this->parseValue($idMaintenanceProcedure, 'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($idMaterial, $idMaintenanceProcedure);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of materials_maintenace_procedures previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @return mixed MySQLi update result
     * @category DML Helper
     */
    public function updateCurrent()
    {
        if (!empty($this->idMaterial) && !empty($this->idMaintenanceProcedure)) {
            return $this->update($this->idMaterial, $this->idMaintenanceProcedure);
        } else {
            return false;
        }
    }

}

?>
