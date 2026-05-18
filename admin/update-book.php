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
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $sql = "UPDATE books SET
                title = '$title',
                author = '$author',
                description = '$description',
                price = '$price',
                image = '$image',
                created_at = '$created_at',
                category_id = '$category_id'
            WHERE id = " . $book_id;

    mysqli_query($conn, $sql);
    header('location: index.php');
