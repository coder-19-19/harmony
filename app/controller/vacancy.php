<?php

$query = $db->prepare('SELECT * FROM languages');
$query->execute([]);
$languages = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    if (isset($_FILES['cv'])) {
        $name = post('name');
        $surname = post('surname');
        $phone = post('phone');
        $email = post('email');
        $language = post('language');
        $comment = post('comment');
        $cv = $_FILES['cv'];

        if ($cv['error'] == 4) {
            $error = 'CV yükləyin';
        } else {
            if (is_uploaded_file($cv['tmp_name'])) {
 
                $cvType = $cv['type'];
                $maxSize = (1024 * 1024 * 20);


                if ($cv['size'] > $maxSize) {
                    $error = 'CV ölçüsü maksimum 20MB ola bilər';
                } else {
                    if ($name && $surname && $phone && $language && $comment) {
                        $cvName = uniqid() . '.docx';
                        $upload = move_uploaded_file($cv['tmp_name'], PATH . '/uploads/cv/' . $cvName);
                        if ($upload) {

                            $query = $db->prepare('INSERT INTO vacancy SET vacancy_name =?,vacancy_surname =?,vacancy_email =?,vacancy_phone =?,vacancy_language =?,vacancy_comment =?,vacancy_cv =?');
                            $check = $query->execute([$name, $surname, $email, $phone, $language, $comment, $cvName]);
                            if ($check) {
                                $success = 'CV uğurla göndərildi';
                            }
                        } else {
                            $error = 'Naməlum xəta';
                        }
                    }
                    else{
                        $error = 'Xanaları doldurun';
                    }
                }
            } else {
                $error =  'Fayl yüklənməyib və ya ölçüsü çox iridir';
            }
        }
    } else {
        $error = 'Naməlum xəta';
    }
}

require view('vacancy');
