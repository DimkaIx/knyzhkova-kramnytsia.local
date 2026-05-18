<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bookshop');

    if (mysqli_connect_errno()) {
        echo 'Помилка підключення до БД (' . mysqli_connect_errno() . '): ' . mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($conn, 'utf8mb4');
