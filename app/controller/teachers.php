<?php

    $query = $db -> prepare('SELECT * FROM teachers LEFT JOIN languages ON language_id = teacher_language ORDER BY teacher_id DESC');
    $query -> execute([]);
    $teachers = $query -> fetchAll(PDO::FETCH_ASSOC);
    require view('teachers');