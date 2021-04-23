<?php

    $id = explode('/',$_SERVER['REQUEST_URI']);
    $id = end($id);
    $id = htmlspecialchars(trim($id));



        $query = $db -> prepare('SELECT * FROM languages ORDER BY language_name ASC');
        $query -> execute([]);
        $languages = $query -> fetchAll(PDO::FETCH_ASSOC);

        $query = $db -> prepare('SELECT * FROM students LEFT JOIN languages ON language_id = student_language WHERE student_id =? ');
        $query -> execute([$id]);
        $student = $query -> fetch(PDO::FETCH_ASSOC);




        if(!$student) {
            header('Location:'.admin_url('students'));
        }

        if(isset($_POST['submit'])){
            $name = post('name');
            $surname = post('surname');
            $email = post('email');
            $phone = post('phone');
            $language = post('language');

            if($name && $surname && $phone && $language){
                $query = $db -> prepare('UPDATE students SET student_name =? ,student_surname =?,student_email =?,student_phone =?,student_language =? WHERE student_id =?');
                $check = $query -> execute([$name,$surname,$email,$phone,$language,$id]);
                if($check){
                    header('Location:'.admin_url("students"));
                }
            }
        }

        require admin_view('student');
