<?php
    require 'init.php';
    $json = [];
    if($_POST['submit']){
        $name = post('name');
        $surname = post('surname');
        $email = post('email');
        $phone = post('phone');
        $message = post('message');
        $language = post('language');

        if(!$name){
            $json['error'] = 'Adınızı daxil edin';
        }
        else if(!$surname){
            $json['error'] = 'Soyadınızı daxil edin';
        }
        else if($email && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $json['error'] = 'Doğru email daxil edin';
        }
        else if(!$language){
            $json['error'] = 'Dili seçin';
        }
        else if(!$phone){
            $json['error'] = 'Nömrənizi daxil edin';
        }
        else if(!$message){
            $json['error'] = 'Mesajınızı daxil edin';
        }
        else{
            $query = $db -> prepare('INSERT INTO messages SET message_name =?,message_surname =? ,message_email =? ,message_language =? ,message_phone =?,message_context =?');
            $check = $query -> execute([$name,$surname,$email,$language,$phone,$message]);
            if($check){
                $json['success'] = 'Mesajınız uğurla göndərildi';
            }
        }

        echo json_encode($json);

    }