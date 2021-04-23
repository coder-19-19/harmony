<?php
    //admins
    $query = $db -> prepare('SELECT * FROM users');
    $query -> execute([]);
    $userRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //teachers
    $query = $db -> prepare('SELECT * FROM students');
    $query -> execute([]);
    $teacherRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //books
    $query = $db -> prepare('SELECT * FROM books');
    $query -> execute([]);
    $bookRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //vacancies
    $query = $db -> prepare('SELECT * FROM vacancy');
    $query -> execute([]);
    $vacancyRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //students
    $query = $db -> prepare('SELECT * FROM teachers');
    $query -> execute([]);
    $studentRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //subscirebers
    $query = $db -> prepare('SELECT * FROM subscribers');
    $query -> execute([]);
    $subRow = $query -> fetchAll(PDO::FETCH_ASSOC);
    //messages
    $query = $db -> prepare('SELECT COUNT(*) FROM messages WHERE message_read = ?');
    $query -> execute([0]);
    $countMessage = $query -> fetchColumn();
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $message = $_POST['message'];
        if($title && $message){
            foreach ($subRow as $subscriber){
                sendEmail($subscriber['subscriber_email'],$title,$message);
            }
        }
    }

    if(isset($_POST['admin_submit'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'] != '' ? password_hash($_POST['admin_password'],PASSWORD_DEFAULT) : session('admin_password');
        $query = $db -> prepare('UPDATE users SET user_name = ?,user_email = ?,user_password =? WHERE user_id = ?');
        $check = $query -> execute([$admin_name,$admin_email,$admin_password,session('admin_id')]);
        if($check){
            header('Location:'.admin_url('logout'));
        }
    }

    if(isset($_POST['new_admin_submit'])){
        $new_admin_name = post('new_admin_name');
        $new_admin_email = post('new_admin_email');
        $new_admin_password = post('new_admin_password');

        if($new_admin_name && $new_admin_email && $new_admin_password){
            $query = $db -> prepare('INSERT INTO users set user_name = ?,user_email = ?,user_password = ?');
            $check = $query -> execute([$new_admin_name,$new_admin_email,password_hash($new_admin_password,PASSWORD_DEFAULT)]);
            if($check){
                header('Location'.admin_url());
            }
        }
    }
    require admin_view('index');