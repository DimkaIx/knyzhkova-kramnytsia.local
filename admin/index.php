<?php
    include_once '../function.php';
    session_start();

    $login = 'admin';
    $password = '12345';

    if (($_SESSION['login'] ?? '') !== $login || ($_SESSION['password'] ?? '') !== $password) {
        header('location: ../login/index.php');
        exit();
    }
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адмін-панель</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="index.php">Адмін-панель</a>
        <nav class="menu">
            <a href="../index.php">На сайт</a>
            <a href="add-book.php">Додати книгу</a>
            <a href="logout.php">Вийти</a>
        </nav>
    </div>
</header>

<main class="container content-page">
    <h1>Усі книги</h1>
    <?php $books = get_books(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Назва книги</th>
            <th>Автор</th>
            <th>Ціна</th>
            <th>Опції</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id']; ?></td>
                <td><?= htmlspecialchars($book['title']); ?></td>
                <td><?= htmlspecialchars($book['author']); ?></td>
                <td><?= number_format($book['price'], 2, '.', ' '); ?> грн</td>
                <td class="admin-actions">
                    <a class="btn btn-warning" href="edit-book.php?book_id=<?= $book['id']; ?>">Редагувати</a>
                    <a class="btn btn-danger" href="delete-book.php?book_id=<?= $book['id']; ?>">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn" href="add-book.php">Додати нову книгу</a>
</main>
</body>
</html>
