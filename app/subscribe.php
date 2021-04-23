<?php
    require 'init.php';
    if($_POST['submit']){
        $json = [];
        $email = htmlspecialchars(trim($_POST['email']));
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
              $json['error'] = 'Doğru email ünvanı daxil edin';
          }
          else{
              $query = $db -> prepare('SELECT * FROM subscribers WHERE subscriber_email =?');
              $query -> execute([$email]);
              $row = $query -> fetch(PDO::FETCH_ASSOC);
              if($row){
                  $json['error'] = 'Bu email ilə artıq qeydiyyatdan keçilib';
              }
              else{
                  $query = $db -> prepare('INSERT INTO subscribers SET subscriber_email = ?');
                  $check = $query -> execute([$email]);

                  if($check){
                      $json['success'] = 'Uğurla abunə oldunuz';
                      sendEmail($email,settings('smtp_subscribe_message_title'),settings('smtp_subscribe_message'));
                  }
                  else{
                      $json['error'] = 'Xəta baş verdi';
                  }
              }

          }

            echo json_encode($json);

    }



?>