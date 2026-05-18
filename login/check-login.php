<?php
    $login = 'admin';
    $password = '12345';

    if ($login == $_POST['login'] && $password == $_POST['password']) {
        session_start();
        session_regenerate_id(true);
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        header('location: ../admin/index.php');
    } else {
        header('location: index.php');
    }
