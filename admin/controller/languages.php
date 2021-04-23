<?php

    $query = $db->prepare('SELECT * FROM languages  ORDER BY language_name ASC ');
    $query->execute([]);
    $languages = $query->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {
        $language_name = post('language_name');
        if ($language_name) {
            $query = $db->prepare('INSERT INTO languages SET language_name = ?');
            $check = $query->execute([$language_name]);
            if ($check) {
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    require admin_view('languages');