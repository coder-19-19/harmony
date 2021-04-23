<?php

    $query = $db -> prepare('SELECT * FROM languages');
    $query -> execute([]);
    $languages = $query -> fetchAll(PDO::FETCH_ASSOC);


    require view('contact');