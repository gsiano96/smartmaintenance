<?php
/**
 * Class BeanPlannedProcedure
 * Bean class for object oriented management of the MySQL table planned_procedure
 *
 * Comment of the managed table planned_procedure: Not specified.
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
 * @filesource BeanPlannedProcedure.php
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

class BeanPlannedProcedure extends MySqlRecord implements Bean
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
     * Class attribute for mapping the primary key activity_id of table planned_procedure
     *
     * Comment for field activity_id: Not specified<br>
     * @var int $activityId
     */
    private $activityId;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field typology
     *
     * Comment for field typology: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $typology
     */
    private $typology;

    /**
     * Class attribute for mapping table field smp_file
     *
     * Comment for field smp_file: Not specified.<br>
     * Field information:
     *  - Data type: blob
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var null $smpFile
     */
    private $smpFile;

    /**
     * Class attribute for mapping table field week
     *
     * Comment for field week: Not specified.<br>
     * Field information:
     *  - Data type: tinyint(4)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $week
     */
    private $week;

    /**
     * Class attribute for mapping table field estimated_intervetion_time_m
     *
     * Comment for field estimated_intervetion_time_m: Not specified.<br>
     * Field information:
     *  - Data type: int(11)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $estimatedIntervetionTimeM
     */
    private $estimatedIntervetionTimeM;

    /**
     * Class attribute for mapping table field interruptible
     *
     * Comment for field interruptible: Not specified.<br>
     * Field information:
     *  - Data type: tinyint(1)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $interruptible
     */
    private $interruptible;

    /**
     * Class attribute for mapping table field workspace_note
     *
     * Comment for field workspace_note: Not specified.<br>
     * Field information:
     *  - Data type: varchar(200)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $workspaceNote
     */
    private $workspaceNote;

    /**
     * Class attribute for mapping table field activity_description
     *
     * Comment for field activity_description: Not specified.<br>
     * Field information:
     *  - Data type: varchar(200)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $activityDescription
     */
    private $activityDescription;

    /**
     * Class attribute for mapping table field area
     *
     * Comment for field area: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $area
     */
    private $area;

    /**
     * Class attribute for mapping table field competence
     *
     * Comment for field competence: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $competence
     */
    private $competence;

    /**
     * Class attribute for storing the SQL DDL of table planned_procedure
     * @var string base64 encoded $ddl
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBwbGFubmVkX3Byb2NlZHVyZWAgKAogIGBhY3Rpdml0eV9pZGAgaW50KDExKSBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwKICBgdHlwb2xvZ3lgIHZhcmNoYXIoNTApIE5PVCBOVUxMLAogIGBzbXBfZmlsZWAgYmxvYiBOT1QgTlVMTCwKICBgd2Vla2AgdGlueWludCg0KSBOT1QgTlVMTCwKICBgZXN0aW1hdGVkX2ludGVydmV0aW9uX3RpbWVfbWAgaW50KDExKSBOT1QgTlVMTCwKICBgaW50ZXJydXB0aWJsZWAgdGlueWludCgxKSBOT1QgTlVMTCwKICBgd29ya3NwYWNlX25vdGVgIHZhcmNoYXIoMjAwKSBERUZBVUxUIE5VTEwsCiAgYGFjdGl2aXR5X2Rlc2NyaXB0aW9uYCB2YXJjaGFyKDIwMCkgTk9UIE5VTEwsCiAgYGFyZWFgIHZhcmNoYXIoNTApIE5PVCBOVUxMLAogIGBjb21wZXRlbmNlYCB2YXJjaGFyKDQwKSBOT1QgTlVMTCwKICBQUklNQVJZIEtFWSAoYGFjdGl2aXR5X2lkYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTMgREVGQVVMVCBDSEFSU0VUPXV0Zjg=";

    /**
     * setActivityId Sets the class attribute activityId with a given value
     *
     * The attribute activityId maps the field activity_id defined as int(11).<br>
     * Comment for field activity_id: Not specified.<br>
     * @param int $activityId
     * @category Modifier
     */
    public function setActivityId($activityId)
    {
        $this->activityId = (int)$activityId;
    }

    /**
     * setTypology Sets the class attribute typology with a given value
     *
     * The attribute typology maps the field typology defined as varchar(50).<br>
     * Comment for field typology: Not specified.<br>
     * @param string $typology
     * @category Modifier
     */
    public function setTypology($typology)
    {
        $this->typology = (string)$typology;
    }

    /**
     * setSmpFile Sets the class attribute smpFile with a given value
     *
     * The attribute smpFile maps the field smp_file defined as blob.<br>
     * Comment for field smp_file: Not specified.<br>
     * @param null $smpFile
     * @category Modifier
     */
    public function setSmpFile($smpFile)
    {
        $this->smpFile = (string)$smpFile;
    }

    /**
     * setWeek Sets the class attribute week with a given value
     *
     * The attribute week maps the field week defined as tinyint(4).<br>
     * Comment for field week: Not specified.<br>
     * @param int $week
     * @category Modifier
     */
    public function setWeek($week)
    {
        $this->week = (int)$week;
    }

    /**
     * setEstimatedIntervetionTimeM Sets the class attribute estimatedIntervetionTimeM with a given value
     *
     * The attribute estimatedIntervetionTimeM maps the field estimated_intervetion_time_m defined as int(11).<br>
     * Comment for field estimated_intervetion_time_m: Not specified.<br>
     * @param int $estimatedIntervetionTimeM
     * @category Modifier
     */
    public function setEstimatedIntervetionTimeM($estimatedIntervetionTimeM)
    {
        $this->estimatedIntervetionTimeM = (int)$estimatedIntervetionTimeM;
    }

    /**
     * setInterruptible Sets the class attribute interruptible with a given value
     *
     * The attribute interruptible maps the field interruptible defined as tinyint(1).<br>
     * Comment for field interruptible: Not specified.<br>
     * @param int $interruptible
     * @category Modifier
     */
    public function setInterruptible($interruptible)
    {
        $this->interruptible = (int)$interruptible;
    }

    /**
     * setWorkspaceNote Sets the class attribute workspaceNote with a given value
     *
     * The attribute workspaceNote maps the field workspace_note defined as varchar(200).<br>
     * Comment for field workspace_note: Not specified.<br>
     * @param string $workspaceNote
     * @category Modifier
     */
    public function setWorkspaceNote($workspaceNote)
    {
        $this->workspaceNote = (string)$workspaceNote;
    }

    /**
     * setActivityDescription Sets the class attribute activityDescription with a given value
     *
     * The attribute activityDescription maps the field activity_description defined as varchar(200).<br>
     * Comment for field activity_description: Not specified.<br>
     * @param string $activityDescription
     * @category Modifier
     */
    public function setActivityDescription($activityDescription)
    {
        $this->activityDescription = (string)$activityDescription;
    }

    /**
     * setArea Sets the class attribute area with a given value
     *
     * The attribute area maps the field area defined as varchar(50).<br>
     * Comment for field area: Not specified.<br>
     * @param string $area
     * @category Modifier
     */
    public function setArea($area)
    {
        $this->area = (string)$area;
    }

    /**
     * setCompetence Sets the class attribute competence with a given value
     *
     * The attribute competence maps the field competence defined as varchar(40).<br>
     * Comment for field competence: Not specified.<br>
     * @param string $competence
     * @category Modifier
     */
    public function setCompetence($competence)
    {
        $this->competence = (string)$competence;
    }

    /**
     * getActivityId gets the class attribute activityId value
     *
     * The attribute activityId maps the field activity_id defined as int(11).<br>
     * Comment for field activity_id: Not specified.
     * @return int $activityId
     * @category Accessor of $activityId
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * getTypology gets the class attribute typology value
     *
     * The attribute typology maps the field typology defined as varchar(50).<br>
     * Comment for field typology: Not specified.
     * @return string $typology
     * @category Accessor of $typology
     */
    public function getTypology()
    {
        return $this->typology;
    }

    /**
     * getSmpFile gets the class attribute smpFile value
     *
     * The attribute smpFile maps the field smp_file defined as blob.<br>
     * Comment for field smp_file: Not specified.
     * @return null $smpFile
     * @category Accessor of $smpFile
     */
    public function getSmpFile()
    {
        return $this->smpFile;
    }

    /**
     * getWeek gets the class attribute week value
     *
     * The attribute week maps the field week defined as tinyint(4).<br>
     * Comment for field week: Not specified.
     * @return int $week
     * @category Accessor of $week
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * getEstimatedIntervetionTimeM gets the class attribute estimatedIntervetionTimeM value
     *
     * The attribute estimatedIntervetionTimeM maps the field estimated_intervetion_time_m defined as int(11).<br>
     * Comment for field estimated_intervetion_time_m: Not specified.
     * @return int $estimatedIntervetionTimeM
     * @category Accessor of $estimatedIntervetionTimeM
     */
    public function getEstimatedIntervetionTimeM()
    {
        return $this->estimatedIntervetionTimeM;
    }

    /**
     * getInterruptible gets the class attribute interruptible value
     *
     * The attribute interruptible maps the field interruptible defined as tinyint(1).<br>
     * Comment for field interruptible: Not specified.
     * @return int $interruptible
     * @category Accessor of $interruptible
     */
    public function getInterruptible()
    {
        return $this->interruptible;
    }

    /**
     * getWorkspaceNote gets the class attribute workspaceNote value
     *
     * The attribute workspaceNote maps the field workspace_note defined as varchar(200).<br>
     * Comment for field workspace_note: Not specified.
     * @return string $workspaceNote
     * @category Accessor of $workspaceNote
     */
    public function getWorkspaceNote()
    {
        return $this->workspaceNote;
    }

    /**
     * getActivityDescription gets the class attribute activityDescription value
     *
     * The attribute activityDescription maps the field activity_description defined as varchar(200).<br>
     * Comment for field activity_description: Not specified.
     * @return string $activityDescription
     * @category Accessor of $activityDescription
     */
    public function getActivityDescription()
    {
        return $this->activityDescription;
    }

    /**
     * getArea gets the class attribute area value
     *
     * The attribute area maps the field area defined as varchar(50).<br>
     * Comment for field area: Not specified.
     * @return string $area
     * @category Accessor of $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * getCompetence gets the class attribute competence value
     *
     * The attribute competence maps the field competence defined as varchar(40).<br>
     * Comment for field competence: Not specified.
     * @return string $competence
     * @category Accessor of $competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Gets DDL SQL code of the table planned_procedure
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
        return "planned_procedure";
    }

    /**
     * The BeanPlannedProcedure constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $activityId is given.
     *  - with a fetched data row from the table planned_procedure having activity_id=$activityId
     * @param int $activityId. If omitted an empty (not fetched) instance is created.
     * @return BeanPlannedProcedure Object
     */
    public function __construct($activityId = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($activityId)) {
            $this->select($activityId);
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
     * Fetchs a table row of planned_procedure into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $activityId the primary key activity_id value of table planned_procedure which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($activityId)
    {
        $sql =  "SELECT * FROM planned_procedure WHERE activity_id={$this->parseValue($activityId,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->activityId = (integer)$rowObject->activity_id;
            @$this->typology = $this->replaceAposBackSlash($rowObject->typology);
            @$this->smpFile = $rowObject->smp_file;
            @$this->week = (integer)$rowObject->week;
            @$this->estimatedIntervetionTimeM = (integer)$rowObject->estimated_intervetion_time_m;
            @$this->interruptible = (integer)$rowObject->interruptible;
            @$this->workspaceNote = $this->replaceAposBackSlash($rowObject->workspace_note);
            @$this->activityDescription = $this->replaceAposBackSlash($rowObject->activity_description);
            @$this->area = $this->replaceAposBackSlash($rowObject->area);
            @$this->competence = $this->replaceAposBackSlash($rowObject->competence);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table planned_procedure
     * @param int $activityId the primary key activity_id value of table planned_procedure which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($activityId)
    {
        $sql = "DELETE FROM planned_procedure WHERE activity_id={$this->parseValue($activityId,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of planned_procedure
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->activityId = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO planned_procedure
            (typology,smp_file,week,estimated_intervetion_time_m,interruptible,workspace_note,activity_description,area,competence)
            VALUES(
			{$this->parseValue($this->typology,'notNumber')},
			{$this->parseValue($this->smpFile,'notNumber')},
			{$this->parseValue($this->week)},
			{$this->parseValue($this->estimatedIntervetionTimeM)},
			{$this->parseValue($this->interruptible)},
			{$this->parseValue($this->workspaceNote,'notNumber')},
			{$this->parseValue($this->activityDescription,'notNumber')},
			{$this->parseValue($this->area,'notNumber')},
			{$this->parseValue($this->competence,'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->activityId = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table planned_procedure with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $activityId the primary key activity_id value of table planned_procedure which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($activityId)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                planned_procedure
            SET 
				typology={$this->parseValue($this->typology,'notNumber')},
				smp_file={$this->parseValue($this->smpFile,'notNumber')},
				week={$this->parseValue($this->week)},
				estimated_intervetion_time_m={$this->parseValue($this->estimatedIntervetionTimeM)},
				interruptible={$this->parseValue($this->interruptible)},
				workspace_note={$this->parseValue($this->workspaceNote,'notNumber')},
				activity_description={$this->parseValue($this->activityDescription,'notNumber')},
				area={$this->parseValue($this->area,'notNumber')},
				competence={$this->parseValue($this->competence,'notNumber')}
            WHERE
                activity_id={$this->parseValue($activityId,'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($activityId);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of planned_procedure previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function updateCurrent()
    {
        if ($this->activityId != "") {
            return $this->update($this->activityId);
        } else {
            return false;
        }
    }

}
?>
