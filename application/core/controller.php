<?php

class controller {

    public $model;
    public $view;

    function __construct() {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    function actionindex() {
        // todo	
    }

}
