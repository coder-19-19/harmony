<?php

$id = explode('/', $_SERVER['REQUEST_URI']);
$id = end($id);
$id = htmlspecialchars(trim($id));

$query = $db->prepare('SELECT * FROM teachers LEFT JOIN languages ON language_id = teacher_language WHERE teacher_id =?');
$query->execute([$id]);
$teacher = $query->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM languages');
$query->execute([]);
$languages = $query->fetchAll(PDO::FETCH_ASSOC);

if (!$teacher) {
    header('Location:' . admin_url('teachers'));
}


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
            $query = $db->prepare('UPDATE  teachers SET teacher_name =?,teacher_surname =?,teacher_email =?,teacher_phone =?,teacher_language =?,teacher_context =? WHERE teacher_id = ?');
            $check = $query->execute([$name, $surname, $email, $phone, $language, $context, $id]);
            if ($check) {
                header('Location:' . admin_url('teachers'));
            }
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

                                unlink(PATH . '/uploads/' . $teacher['teacher_photo']);

                                $query = $db->prepare('UPDATE  teachers SET teacher_name =?,teacher_surname =?,teacher_email =?,teacher_phone =?,teacher_language =?,teacher_context =?,teacher_photo =? WHERE teacher_id = ?');
                                $check = $query->execute([$name, $surname, $email, $phone, $language, $context, $photoName, $id]);
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


require admin_view('teacher');
