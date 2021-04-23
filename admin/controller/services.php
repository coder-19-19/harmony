<?php

$query = $db->prepare('SELECT * FROM services ORDER BY service_id DESC');
$query->execute([]);
$services = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    if (isset($_FILES['photo'])) {
        $title = post('title');
        $context = post('context');
        $photo = $_FILES['photo'];

        if ($photo['error'] == 4) {
            $error = 'Fayl seçin';
        } else {
            $memeTypes = [
                'image/jpeg',
                'image/jpg',
                'image/png',
            ];
            $photoType = $photo['type'];
            if (in_array($photoType, $memeTypes)) {
                    $photoType = explode('/', $photoType)[1];
                    $photoName = uniqid() . '.' . $photoType;
                    $upload = move_uploaded_file($photo['tmp_name'], PATH . '/uploads/service/' . $photoName);
                    if ($upload) {

                        $query = $db->prepare('INSERT INTO services SET service_title =?,service_context =?,service_link =?');
                        $check = $query->execute([$title,$context,$photoName]);
                        if ($check) {
                            header('Location:' . admin_url('services'));
                        }
                    } else {
                        $error = 'Naməlum xəta';
                    }
                
            } else {
                $error = 'Şəkil png,jpg və ya jpeg formatında olmalıdır';
            }
        }
    } else {
        $error = 'Naməlum xəta';
    }
}

require admin_view('services');
