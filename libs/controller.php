<?php

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
        session_start();
        require 'utilidades/Cookies.php';
        require 'utilidades/JWTs.php';
        require 'utilidades/SessionStorage.php';
        require_once 'utilidades/Formatos.php';

    }
    public function loadModel($model)
    {
        $url = 'models/' . ucfirst($model) . '_Model.php';
        
        if (file_exists($url)) {
            require $url;

            $modelName   = ucfirst($model) . '_Model';
            $this->model = new $modelName();
        }
    }
}