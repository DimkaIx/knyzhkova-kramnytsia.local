<?php
    include_once '../function.php';
    check_admin();
    check_csrf();

    $book_id = $_POST['book_id'] ?? 0;
    if (!is_numeric($book_id)) {
        exit('Невірний номер книги');
    }

    delete_book($book_id);
    header('location: index.php');
