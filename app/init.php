<?php
    session_start();
    ob_start();
    date_default_timezone_set('Asia/Baku');
    //load all classes
    function loadClasses($className){
        require __DIR__ . '/classes/' . $className . '.php';
    }
    spl_autoload_register('loadClasses');

    //config
    $config = require __DIR__ . '/config.php';

    //db settings
    try{
        $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'] .';charset=utf8',$config['db']['username'],$config['db']['password']);
    }
    catch(PDOException $e){
        die($e -> getMessage());
    }

    require __DIR__ . '/settings.php';

    //load helper
    foreach(glob(__DIR__ . '/helper/*.php') as $helper){
        require $helper;
    }
    