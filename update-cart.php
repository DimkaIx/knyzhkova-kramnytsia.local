<?php
    session_start();

    $book_id = $_POST['book_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;

    if (is_numeric($book_id) && is_numeric($quantity) && isset($_SESSION['cart'][$book_id])) {
        $quantity = (int)$quantity;

        if ($quantity < 1) {
            unset($_SESSION['cart'][$book_id]);
        } else {
            $_SESSION['cart'][$book_id] = min($quantity, 20);
        }
    }

    header('location: cart.php');
