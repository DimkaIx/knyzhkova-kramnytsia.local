<?php
    include_once 'function.php';
    check_csrf();

    $book_id = $_POST['book_id'] ?? 0;
    if (!is_numeric($book_id) || !get_book_by_id($book_id)) {
        header('location: index.php');
        exit();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$book_id])) {
        $_SESSION['cart'][$book_id]++;
    } else {
        $_SESSION['cart'][$book_id] = 1;
    }

    header('location: cart.php');
    exit();
