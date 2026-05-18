<?php
    include_once '../conf.php';
    session_start();

    if (($_SESSION['login'] ?? '') !== 'admin' || ($_SESSION['password'] ?? '') !== '12345') {
        header('location: ../login/index.php');
        exit();
    }

    if (isset($_FILES['image']) && $_FILES['image']['tmp_name'] != '') {
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/uploads/' . $file_name);
        $image = 'assets/uploads/' . $file_name;
    } else {
        $image = 'assets/no-image.svg';
    }

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $sql = "INSERT INTO books (title, author, description, price, image, created_at, category_id)
            VALUES ('$title', '$author', '$description', '$price', '$image', '$created_at', '$category_id')";

    mysqli_query($conn, $sql);
    header('location: index.php');
