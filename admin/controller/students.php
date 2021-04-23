<?php

    $query = $db -> prepare('SELECT * FROM students LEFT JOIN languages ON language_id = student_language ORDER BY student_id DESC');
    $query -> execute([]);
    $students = $query -> fetchAll(PDO::FETCH_ASSOC);

    $query = $db -> prepare('SELECT * FROM languages ORDER BY language_name ASC');
    $query -> execute([]);
    $languages = $query -> fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
        $name = post('name');
        $surname = post('surname');
        $email = post('email');
        $phone = post('phone');
        $language = post('language');

        if($name && $surname && $phone && $language){
            $query = $db -> prepare('INSERT INTO students SET student_name =? ,student_surname =?,student_email =?,student_phone =?,student_language =?');
            $check = $query -> execute([$name,$surname,$email,$phone,$language]);
            if($check){
                header('Location:'.admin_url('students'));
            }
        }
    }
    require admin_view('students');