<?php
    
    $query = $db -> prepare('SELECT * FROM book_categories ORDER BY category_id DESC');
    $query -> execute([]);
    $books_categories = $query -> fetchAlL(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
        $name = post('name');

        if($name){
            $query = $db -> prepare('INSERT INTO book_categories SET category_name =?');
            $check = $query -> execute([$name]);
            if($check){
                header('Location:' . admin_url('book-category'));
            }
        }
    }
    require admin_view('book-category');