<?php

    require __DIR__ . '/app/init.php';
    $route = array_filter(explode('/',$_SERVER['REQUEST_URI']));
    if(SUBFOLDER === true){
        array_shift($route);
    }

    if(!route(0)){
        $route[0] = 'index';
    }
    if(!file_exists(controller(route(0)))){
        $route[0] = '404';
    }

    if(settings('maintenance') == 1 && route(0) != 'admin'){
        $route[0] = 'maintenance';
    }

        $query = $db -> prepare('SELECT * FROM site WHERE id =?');
        $query -> execute([1]);
        $view = $query -> fetch(PDO::FETCH_ASSOC);
        if($view){
            $num = $view['site_view'];
        }

    if(!session('admin_id')){
        $num++;
        $query = $db -> prepare('UPDATE site SET site_view = ? WHERE id = 1');
        $query -> execute([$num]);
    }

    
    require controller(route(0));


