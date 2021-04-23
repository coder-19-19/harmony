<?php


    $query = $db -> prepare('SELECT * FROM books');
    $query -> execute([]);
    $books = $query -> fetchAll(PDO::FETCH_ASSOC);

    $query = $db -> prepare('SELECT * FROM services ORDER BY service_id DESC');
    $query -> execute([]);
    $services = $query -> fetchAll(PDO::FETCH_ASSOC);

    require view('index');