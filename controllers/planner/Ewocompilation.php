<?php

namespace controllers\planner;

use framework\Controller;
use framework\View;

class Ewocompilation extends Controller
{
    /**
     * Home constructor.
     * @override parent constructor
     */
    public function __construct()
    {
        /**
         * A reference to the file: templates/home.html.tpl
         * @note Do not to specify the file extension ".html.tpl".
         */
        $tplName = "/planner/ewo_compilation";


        /**
         * Set the view variable with a new object of type framework\View.
         * @note: We create the View object passing reference to the template home.
         */
        $this->view = new View($tplName);

      /**
       * The parent class Controller handle the necessary operations to print the
       * output. First, it uses the created View object to load the file containing
       * the template, then it renders the template in the browser.
       */

        parent::__construct($this->view);
    }

}
