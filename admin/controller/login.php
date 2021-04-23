<?php
    if (isset($_POST['submit'])){
        $email = post('email');
        $password = post('password');

        if(!$email){
            $error = 'Emailinizi daxil edin';
        }
        else if(!$password){
            $error = 'Şifrənizi daxil edin!';
        }
        else{
            $query = $db -> prepare('SELECT * FROM users WHERE user_email = ?');
            $query -> execute([$email]);
            $user = $query -> fetch(PDO::FETCH_ASSOC);
            if($user){
                if(!password_verify($password,$user['user_password'])){
                    $error = 'Şifrənizi doğru daxil edin';
                }
                else{
                    $success = 'Uğurla giriş etdiniz yönləndirilirsiniz';
                    $_SESSION['admin_id'] = $user['user_id'];
                    $_SESSION['admin_name'] = $user['user_name'];
                    $_SESSION['admin_password'] = $user['user_password'];

                    $query = $db -> prepare('UPDATE users SET user_last_time = ? WHERE user_id = ?');
                    $query -> execute([ date('Y-m-d H:i:s'),session('admin_id')]);

                    header('Refresh:2;url='.admin_url());
                }
            }
            else{
                $error = 'Belə istifadəçi yoxdur';
            }
        }

    }

     require admin_view('login');