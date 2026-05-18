<?php
    include_once 'header.php';

    $book_id = $_GET['book_id'] ?? 0;
    if (!is_numeric($book_id)) {
        exit('Невірний номер книги');
    }

    $book = get_book_by_id($book_id);
?>

<main class="container content-page">
    <?php if ($book): ?>
        <article class="book-full">
            <img src="<?= e($book['image']); ?>" alt="<?= e($book['title']); ?>">
            <div>
                <p class="category-name"><?= e($book['category_title']); ?></p>
                <h1><?= e($book['title']); ?></h1>
                <p class="author">Автор: <?= e($book['author']); ?></p>
                <p class="price"><?= number_format($book['price'], 2, '.', ' '); ?> грн</p>
                <p><?= nl2br(e($book['description'])); ?></p>
                <p><strong>Дата додавання:</strong> <?= date('d.m.Y', strtotime($book['created_at'])); ?></p>
                <a class="btn" href="index.php">Повернутися назад</a>
            </div>
        </article>
    <?php else: ?>
        <h1>Книгу не знайдено</h1>
        <p>Можливо, запис було видалено з каталогу.</p>
    <?php endif; ?>
</main>

<?php include_once 'footer.php'; ?>
