<?php

    if(isset($_POST['submit'])){
        $html = '<?php' . PHP_EOL.PHP_EOL;
        foreach (post('settings') as $key => $setting){
            $html .= '$settings["'. $key .'"] = "'. $setting .'";' .PHP_EOL;
        }
        file_put_contents(PATH . '/app/settings.php',$html);
        header('Location:' . admin_url('settings'));

    }

    require admin_view('settings');