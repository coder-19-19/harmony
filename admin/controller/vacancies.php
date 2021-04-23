<?php

    $query = $db -> prepare('SELECT * FROM vacancy LEFT JOIN languages ON language_id = vacancy_language ORDER BY vacancy_id DESC');
    $query -> execute([]);
    $vacancies = $query -> fetchAll(PDO::FETCH_ASSOC);
    
    require admin_view('vacancies');