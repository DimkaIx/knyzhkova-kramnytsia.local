<?php
    include_once 'function.php';
    check_csrf();

    $book_id = $_POST['book_id'] ?? 0;

    if (is_numeric($book_id) && isset($_SESSION['cart'][$book_id])) {
        unset($_SESSION['cart'][$book_id]);
    }

    header('location: cart.php');
    exit();
