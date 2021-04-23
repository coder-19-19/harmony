<?php

$id = explode('/', $_SERVER['REQUEST_URI']);
$id = end($id);
$id = htmlspecialchars(trim($id));

$query = $db->prepare('SELECT * FROM services  WHERE service_id =?');
$query->execute([$id]);
$service = $query->fetch(PDO::FETCH_ASSOC);


if (!$service) {
    header('Location:' . admin_url('services'));
}


if (isset($_POST['submit'])) {
    if (isset($_FILES['photo'])) {
        $title = post('title');
        $context = post('context');
        $photo = $_FILES['photo'];

        if ($photo['error'] == 4) {
            $query = $db->prepare('UPDATE  services SET service_title =?,service_context =? WHERE service_id = ?');
            $check = $query->execute([$title,$context,$id]);
            if ($check) {
                header('Location:' . admin_url('services'));
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
                        if ($title  && $context) {
                            $photoType = explode('/', $photoType)[1];
                            $photoName = uniqid() . '.' . $photoType;
                            $upload = move_uploaded_file($photo['tmp_name'], PATH . '/uploads/service/' . $photoName);
                            if ($upload) {

                                unlink(PATH . '/uploads/service/' . $service['service_link']);

                                $query = $db->prepare('UPDATE  services SET service_title =?,service_context =?,service_link =? WHERE service_id = ?');
                                $check = $query->execute([$title, $context, $photoName,$id]);
                                if ($check) {
                                    header('Location:' . admin_url('services'));
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


require admin_view('service');
