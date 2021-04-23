<?php

$query = $db->prepare('SELECT * FROM teachers LEFT JOIN languages ON teacher_language = language_id ORDER BY teacher_id DESC');
$query->execute([]);
$teachers = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM languages ORDER BY language_name ASC');
$query->execute([]);
$languages = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    if (isset($_FILES['photo'])) {
        $name = post('name');
        $surname = post('surname');
        $phone = post('phone');
        $email = post('email');
        $language = post('language');
        $context = post('context');
        $photo = $_FILES['photo'];

        if ($photo['error'] == 4) {
            $error = 'Fayl seçin';
        } else {
            if (is_uploaded_file($photo['tmp_name'])) {
                $memeTypes = [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                ];

                $photoType = $photo['type'];
                $maxSize = (1024 * 1024 * 3);

                if (in_array($photoType, $memeTypes)) {
                    if ($photo['size'] > $maxSize) {
                        $error = 'Şəklin ölçüsü maksimum 3MB ola bilər';
                    } else {
                        if ($name && $surname && $phone && $language && $context) {
                            $photoType = explode('/', $photoType)[1];
                            $photoName = uniqid() . '.' . $photoType;
                            $upload = move_uploaded_file($photo['tmp_name'], PATH . '/uploads/' . $photoName);
                            if ($upload) {

                                $query = $db->prepare('INSERT INTO teachers SET teacher_name =?,teacher_surname =?,teacher_email =?,teacher_phone =?,teacher_language =?,teacher_context =?,teacher_photo =?');
                                $check = $query->execute([$name, $surname, $email, $phone, $language, $context, $photoName]);
                                if ($check) {
                                    header('Location:' . admin_url('teachers'));
                                }
                            } else {
                                $error = 'Naməlum xəta';
                            }
                        }
                    }
                } else {
                    $error = 'Şəkil png,jpg və ya jpeg formatında olmalıdır';
                }
            } else {
                $error =  'Fayl yüklənməyib və ya ölçüsü çox iridir';
            }
        }
    } else {
        $error = 'Naməlum xəta';
    }
}


require admin_view('teachers');
