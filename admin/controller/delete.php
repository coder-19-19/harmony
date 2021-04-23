<?php
        
    if($_POST) {

        $table = $_POST['table'];
        $column = $_POST['column'];
        $id = $_POST['id'];

        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $column . ' = ?';
        $query = $db -> prepare($sql);
        $check = $query -> execute([$id]);

        if($check){
            echo 'Silindi';
        }

    }
    else{

        $data = explode('/',$_SERVER['REQUEST_URI']);
        $table = htmlspecialchars(trim($data[4]));
        $column = htmlspecialchars(trim($data[5]));
        $id = htmlspecialchars(trim($data[6]));

        if($table == 'teachers'){
            $query = $db -> prepare('SELECT * FROM teachers WHERE teacher_id =?');
            $query -> execute([$id]);
            $img = $query -> fetch(PDO::FETCH_ASSOC);
            unlink(PATH . '/uploads/' . $img['teacher_photo']);
        }
        if($table == 'vacancy'){
            $query = $db -> prepare('SELECT * FROM vacancy WHERE vacancy_id =?');
            $query -> execute([$id]);
            $cv = $query -> fetch(PDO::FETCH_ASSOC);
            unlink(PATH . '/uploads/cv/' . $cv['vacancy_cv']);
        }
        if($table == 'books'){
            $query = $db -> prepare('SELECT * FROM books WHERE book_id =?');
            $query -> execute([$id]);
            $book = $query -> fetch(PDO::FETCH_ASSOC);
            unlink(PATH . '/uploads/books/' . $book['book_link']);
            unlink(PATH . '/uploads/book-photos/' . $book['book_photo']);
        }
        if($table == 'services'){
            $query = $db -> prepare('SELECT * FROM services WHERE service_id =?');
            $query -> execute([$id]);
            $service = $query -> fetch(PDO::FETCH_ASSOC);
            unlink(PATH . '/uploads/service/' . $service['service_link']);
        }
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $column . ' = ?';
        $query = $db -> prepare($sql);
        $check = $query -> execute([$id]);

        

        if($check){
            header('Location:'. $_SERVER['HTTP_REFERER']);
        }
    }


