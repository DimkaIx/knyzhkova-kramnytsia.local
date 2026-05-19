<?php
    include_once 'function.php';
    check_csrf();

    $cart = $_SESSION['cart'] ?? [];
    if (!$cart) {
        header('location: cart.php');
        exit();
    }

    $order = [
        'name' => trim($_POST['name'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'address' => trim($_POST['address'] ?? ''),
        'comment' => trim($_POST['comment'] ?? ''),
        'total' => 0,
    ];

    foreach ($cart as $book_id => $quantity) {
        $book = get_book_by_id($book_id);
        if ($book) {
            $order['total'] += $book['price'] * $quantity;
        }
    }

    $_SESSION['last_order'] = $order;
    unset($_SESSION['cart']);

    header('location: order-success.php');
