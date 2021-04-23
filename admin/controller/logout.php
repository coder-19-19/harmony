<?php


    $query = $db -> prepare('UPDATE users SET user_last_time = ? WHERE user_id = ?');
    $query -> execute([ date('Y-m-d H:i:s'),session('admin_id')]);

    session_destroy();
    header('Location:' . admin_url());
    exit;