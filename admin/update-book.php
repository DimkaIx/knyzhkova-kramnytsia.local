<?php
    include_once '../function.php';
    check_admin();
    check_csrf();

    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
    $old_image = mysqli_real_escape_string($conn, $_POST['old_image']);
    $image = upload_book_image($_FILES['image'] ?? null, $old_image);

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

    $sql = "UPDATE books SET
                title = '$title',
                author = '$author',
                description = '$description',
                price = '$price',
                image = '$image',
                original_language = '$original_language',
                ukrainian_translation = '$ukrainian_translation',
                publisher = '$publisher',
                published_at = $published_at_sql,
                pages = '$pages',
                isbn = '$isbn',
                created_at = '$created_at',
                category_id = '$category_id'
            WHERE id = " . $book_id;

    mysqli_query($conn, $sql);
    header('location: index.php');
