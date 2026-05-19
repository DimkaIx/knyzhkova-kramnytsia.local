<?php
    include_once 'conf.php';

    function e($value) {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }

    function check_admin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (($_SESSION['login'] ?? '') !== 'admin' || ($_SESSION['password'] ?? '') !== '12345') {
            header('location: ../login/index.php');
            exit();
        }
    }

    function csrf_token() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    function csrf_field() {
        return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
    }

    function check_csrf() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            exit('Помилка безпеки: неправильний CSRF-токен');
        }
    }

    function upload_book_image($file, $old_image = 'assets/no-image.svg') {
        if (!isset($file) || $file['tmp_name'] == '') {
            return $old_image;
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed_extensions)) {
            return $old_image;
        }

        $file_name = time() . '_' . bin2hex(random_bytes(6)) . '.' . $extension;
        $upload_path = __DIR__ . '/assets/uploads/' . $file_name;

        if (move_uploaded_file($file['tmp_name'], $upload_path)) {
            return 'assets/uploads/' . $file_name;
        }

        return $old_image;
    }

    function get_categories() {
        global $conn;
        $sql = "SELECT * FROM categories ORDER BY id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function get_books($search = '') {
        global $conn;
        $sql = "SELECT books.*, categories.title AS category_title
                FROM books
                LEFT JOIN categories ON books.category_id = categories.id";

        if ($search != '') {
            $search = mysqli_real_escape_string($conn, $search);
            $sql .= " WHERE books.title LIKE '%$search%'
                      OR books.author LIKE '%$search%'
                      OR books.description LIKE '%$search%'
                      OR categories.title LIKE '%$search%'";
        }

        $sql .= " ORDER BY books.id DESC";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function get_book_by_id($book_id) {
        global $conn;
        $book_id = mysqli_real_escape_string($conn, $book_id);
        $sql = "SELECT books.*, categories.title AS category_title
                FROM books
                LEFT JOIN categories ON books.category_id = categories.id
                WHERE books.id = " . $book_id;
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function get_books_by_category($category_id) {
        global $conn;
        $category_id = mysqli_real_escape_string($conn, $category_id);
        $sql = "SELECT * FROM books WHERE category_id = " . $category_id . " ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function get_category_by_id($category_id) {
        global $conn;
        $category_id = mysqli_real_escape_string($conn, $category_id);
        $sql = "SELECT * FROM categories WHERE id = " . $category_id;
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function delete_book($book_id) {
        global $conn;
        $book_id = mysqli_real_escape_string($conn, $book_id);
        $sql = "DELETE FROM books WHERE id = " . $book_id;
        mysqli_query($conn, $sql);
    }

    function cart_count() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $count = 0;
        foreach (($_SESSION['cart'] ?? []) as $quantity) {
            $count += $quantity;
        }

        return $count;
    }

    function short_text($text, $length = 140) {
        if (mb_strlen($text, 'utf-8') <= $length) {
            return $text;
        }

        return mb_substr($text, 0, $length, 'utf-8') . '...';
    }
