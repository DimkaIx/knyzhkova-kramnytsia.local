<?php
    include_once '../function.php';
    session_start();

    if (($_SESSION['login'] ?? '') !== 'admin' || ($_SESSION['password'] ?? '') !== '12345') {
        header('location: ../login/index.php');
        exit();
    }

    $book_id = $_GET['book_id'] ?? 0;
    if (!is_numeric($book_id)) {
        exit('Невірний номер книги');
    }

    delete_book($book_id);
    header('location: index.php');
