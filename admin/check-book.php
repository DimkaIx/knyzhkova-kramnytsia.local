<?php
    include_once '../function.php';
    check_admin();
    check_csrf();

    $image = upload_book_image($_FILES['image'] ?? null);

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $original_language = mysqli_real_escape_string($conn, $_POST['original_language'] ?? '');
    $ukrainian_translation = mysqli_real_escape_string($conn, $_POST['ukrainian_translation'] ?? '');
    $publisher = mysqli_real_escape_string($conn, $_POST['publisher'] ?? '');
    $published_at = mysqli_real_escape_string($conn, $_POST['published_at'] ?? '');
    $pages = mysqli_real_escape_string($conn, $_POST['pages'] ?? 0);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn'] ?? '');
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $published_at_sql = $published_at !== '' ? "'$published_at'" : "NULL";

    $sql = "INSERT INTO books (title, author, description, price, image, original_language, ukrainian_translation, publisher, published_at, pages, isbn, created_at, category_id)
            VALUES ('$title', '$author', '$description', '$price', '$image', '$original_language', '$ukrainian_translation', '$publisher', $published_at_sql, '$pages', '$isbn', '$created_at', '$category_id')";

    mysqli_query($conn, $sql);
    header('location: index.php');
