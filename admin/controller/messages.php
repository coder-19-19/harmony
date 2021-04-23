<?php

    $query = $db -> prepare('SELECT * FROM messages  LEFT JOIN languages ON message_language = language_id LEFT JOIN users ON user_id = message_read_admin ORDER BY message_read ASC');
    $query -> execute([]);
    $messages = $query -> fetchAll(PDO::FETCH_ASSOC);

    require admin_view('messages');