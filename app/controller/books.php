<?php

    $query = $db -> prepare('SELECT * FROM books LEFT JOIN book_categories ON book_category = category_id ORDER BY book_id DESC');
    $query -> execute([]);
    $books = $query -> fetchAll(PDO::FETCH_ASSOC);
    
    $query = $db -> prepare('SELECT * FROM languages ORDER BY language_id');
    $query -> execute([]);
    $languages = $query -> fetchAll(PDO::FETCH_ASSOC);
    
    $query = $db -> prepare('SELECT * FROM book_categories ORDER BY category_name');
    $query -> execute([]);
    $categories = $query -> fetchAll(PDO::FETCH_ASSOC);

    require view('books');