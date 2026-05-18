<?php
    include_once '../function.php';
    check_admin();
    check_csrf();

    $image = upload_book_image($_FILES['image'] ?? null);

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
