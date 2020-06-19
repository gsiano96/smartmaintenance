<?php
/**
 * Class Index
 *
 * {ModelResponsability}
 *
 * @package models\maintainer
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\maintainer;

use framework\Model;

class Index extends Model
{
    /**
    * Object constructor.
    *
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|array|null $parameters Additional parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {

    }

    public function getNameById($Iden){
        $this->sql = <<<SQL
        SELECT 
	        first_name as Name,
            last_name as Surname
        FROM
            employee
        WHERE 
	        id_employee = $Iden
SQL;
        $this->updateResultSet();
        return $this->getResultSet();
    }
}
