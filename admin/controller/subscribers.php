<?php

    $query = $db -> prepare('SELECT * FROM subscribers ORDER BY subscriber_id DESC');
    $query -> execute([]);
    $row = $query -> fetchAll(PDO::FETCH_ASSOC);



    require admin_view('subscribers');