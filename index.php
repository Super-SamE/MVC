<?php

    require_once 'app/lib/pdoconnect.php';
    require 'app/lib/Dev.php';
    
    spl_autoload_register(function ($class) {
        if (file_exists("app/controller/". $class .".php")) {
            require_once "app/controller/". $class .".php";
        } elseif(file_exists("app/model/". $class .".php")) {
            require_once "app/model/". $class .".php";
        }
    });

    if(!empty($_GET['class'] && $_GET['option'])) {
        $class = $_GET['class'];
        $option = $_GET['option']; 
    } else {
        $class = 'Maincontroller';
        $option = 'get_btn';
    }

    if(method_exists($class, $option)) {
        $model = new $class;
        $model->$option();
    }
    
?>