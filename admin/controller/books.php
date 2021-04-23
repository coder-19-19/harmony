<?php

    $query = $db -> prepare('SELECT * FROM books LEFT JOIN book_categories ON category_id = book_category LEFT JOIN languages ON language_id = book_language ORDER BY book_id DESC');
    $query -> execute([]);
    $books = $query -> fetchAll(PDO::FETCH_ASSOC);

    $query = $db -> prepare('SELECT * FROM book_categories');
    $query -> execute([]);
    $categories = $query -> fetchAll(PDO::FETCH_ASSOC);

    $query = $db -> prepare('SELECT * FROM languages');
    $query -> execute([]);
    $languages = $query -> fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {
        if (isset($_FILES['photo']) && isset($_FILES['pdf'])) {

            $name = post('name');
            $author = post('author');
            $category = post('category');
            $language = post('language');
            $admin = $_SESSION['admin_name'];
            $photo = $_FILES['photo'];
            $pdf = $_FILES['pdf'];
            if ($photo['error'] == 4 || $pdf['error'] == 4) {
                $error = 'Faylları seçin';
            } else {
                if (is_uploaded_file($photo['tmp_name']) && is_uploaded_file($pdf['tmp_name'])) {
          
                    $photoType = $photo['type'];
                    $pdfType = $pdf['type'];
                    $maxSize = (1024 * 1024 * 3);
    
                        if ($photo['size'] > $maxSize ) {
                            $error = 'Şəklin ölçüsü maksimum 3MB ola bilər';
                        } else {
                            if ($name && $admin) {
                                $photoType = explode('/', $photoType)[1];
                                $photoName = uniqid() . '.' . $photoType;
                                $pdfName = uniqid() . '.docx';
                                $uploadPhoto = move_uploaded_file($photo['tmp_name'], PATH . '/uploads/book-photos/' . $photoName);
                                $uploadPdf = move_uploaded_file($pdf['tmp_name'], PATH . '/uploads/books/' . $pdfName);
                                if ($uploadPhoto && $uploadPdf) {
    
                                    $query = $db->prepare('INSERT INTO books SET book_name =?,book_author =?,book_link =?,book_photo =?,book_category=?,book_language=?,book_admin =?');
                                    $check = $query->execute([$name,$author,$pdfName,$photoName,$category,$language,$admin]);
                                    if ($check) {
                                        header('Location:' . admin_url('books'));
                                    }
                                } else {
                                    $error = 'Naməlum xəta';
                                }
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
    


    require admin_view('books');