<?php
    include_once 'header.php';

    $category_id = $_GET['category_id'] ?? 0;
    if (!is_numeric($category_id)) {
        exit('Невірний номер категорії');
    }

    $category = get_category_by_id($category_id);
    $books = get_books_by_category($category_id);
?>

<main class="container content-page">
    <?php if ($category): ?>
        <h1><?= htmlspecialchars($category['title']); ?></h1>
        <p class="lead"><?= htmlspecialchars($category['description']); ?></p>

        <div class="book-grid">
            <?php foreach ($books as $book): ?>
                <article class="book-card">
                    <a href="book.php?book_id=<?= $book['id']; ?>">
                        <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    </a>
                    <div class="book-card-body">
                        <h3><?= htmlspecialchars($book['title']); ?></h3>
                        <p class="author"><?= htmlspecialchars($book['author']); ?></p>
                        <p><?= htmlspecialchars(short_text($book['description'])); ?></p>
                        <div class="card-bottom">
                            <strong><?= number_format($book['price'], 2, '.', ' '); ?> грн</strong>
                            <a class="btn" href="book.php?book_id=<?= $book['id']; ?>">Детальніше</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (!$books): ?>
            <p>У цій категорії поки немає книг.</p>
        <?php endif; ?>
    <?php else: ?>
        <h1>Категорію не знайдено</h1>
        <p>Поверніться на головну сторінку та оберіть інший розділ.</p>
    <?php endif; ?>
</main>

<?php include_once 'footer.php'; ?>
