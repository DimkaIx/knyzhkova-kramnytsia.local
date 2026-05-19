<?php
    include_once '../function.php';
    check_admin();
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
    <div class="container header-main admin-header">
        <a class="logo" href="index.php">
            <span class="logo-mark">А</span>
            <span>Адмін<br>панель</span>
        </a>
        <nav class="admin-menu">
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
                <td><?= e($book['title']); ?></td>
                <td><?= e($book['author']); ?></td>
                <td><?= number_format($book['price'], 2, '.', ' '); ?> грн</td>
                <td class="admin-actions">
                    <a class="btn btn-warning" href="edit-book.php?book_id=<?= $book['id']; ?>">Редагувати</a>
                    <form action="delete-book.php" method="post" data-confirm="Видалити цю книгу з каталогу?">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                        <button class="btn btn-danger" type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn" href="add-book.php">Додати нову книгу</a>
</main>
<script src="../js/main.js"></script>
</body>
</html>
