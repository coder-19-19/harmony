<?php

    $id = (explode('/',$_SERVER['REQUEST_URI']));
    $id = end($id);
    $id = htmlspecialchars(trim($id));

    if($id){
        $query = $db -> prepare('SELECT * FROM messages LEFT JOIN languages ON language_id = message_language LEFT JOIN users ON user_id = message_read_admin WHERE message_id = ? ');
        $query -> execute([$id]);
        $message = $query -> fetch(PDO::FETCH_ASSOC);
        if(!$message){
            header('Location:'.admin_url('messages'));
        }
        if($message['message_read'] == 0){
            $query = $db -> prepare('UPDATE messages SET message_read =?, message_read_time = ?,message_read_admin =? WHERE message_id = ?');
            $query -> execute([1,date('Y-m-d H:i:s'),session('admin_id'),$id]);
        }
    }
    else{
        header('Location:'.admin_url('messages'));
    }

    if(isset($_POST['submit'])){
        $email = post('email');
        $subject = post('subject');
        $messageP = post('message');
        if($email && $subject && $messageP){
            sendEmail($email,$subject,$messageP);
        }
    }

    require admin_view('message');
