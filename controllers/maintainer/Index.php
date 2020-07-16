<?php
/**
 * Class Index
 *
 * {ControllerResponsability}
 *
 * @package controllers\maintainer
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers\maintainer;

use framework\Controller;
use framework\Model;
use framework\View;
use models\maintainer\Index as IndexModel;
use views\maintainer\Index as IndexView;

class Index extends Controller
{
    protected $view;
    protected $model;

    /**
    * Object constructor.
    *
    * @param View $view
    * @param Model $mode
    */
    public function __construct(View $view=null, Model $model=null)
    {
        $this->grantRole(ADMIN_ROLE_ID);  // Administrator
        $this->grantRole(MAINTAINER_ROLE_ID);   // Manager (see access_level table)
        $this->user = $this->restrictToAuthentication(null, "maintainer/index");
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view, $this->model);
        $usrIden = $this->user->getId();
        $data = $this->model->getNameById($usrIden);
        $stats = $this->model->getStatsById($usrIden);
        $this->view->setMaintainerNameRow($data);
        $this->view->setNavbarStats($stats, $usrIden);
    }

    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {
        echo $_POST["login_form_do_logout"];
        if (isset($_POST["login_form_do_logout"])) {
            $this->user->logout();
            header("Location:" . SITEURL);
        }

    }


    /**
    * Inizialize the View by loading static design of /maintainer/index.html.tpl
    * managed by views\maintainer\Index class
    *
    */
    public function getView()
    {
        $view = new IndexView("/maintainer/index");
        return $view;
    }

    /**
    * Inizialize the Model by loading models\maintainer\Index class
    *
    */
    public function getModel()
    {
        $model = new IndexModel();
        return $model;
    }
}
