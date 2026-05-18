<?php
    include_once 'conf.php';

    function get_categories() {
        global $conn;
        $sql = "SELECT * FROM categories ORDER BY id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function get_books() {
        global $conn;
        $sql = "SELECT books.*, categories.title AS category_title
                FROM books
                LEFT JOIN categories ON books.category_id = categories.id
                ORDER BY books.id DESC";
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

    function short_text($text, $length = 140) {
        if (mb_strlen($text, 'utf-8') <= $length) {
            return $text;
        }

        return mb_substr($text, 0, $length, 'utf-8') . '...';
    }
