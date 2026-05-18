<?php include_once 'header.php'; ?>

<main class="container shop-layout">
    <aside class="catalog-sidebar">
        <h2>Каталог</h2>
        <?php foreach ($categories as $category): ?>
            <a href="category.php?category_id=<?= $category['id']; ?>">
                <?= e($category['title']); ?>
            </a>
        <?php endforeach; ?>
    </aside>

    <section class="shop-main">
        <div class="shop-hero">
            <div>
                <p class="hero-label">Книжкова інтернет-крамниця</p>
                <h1>Книги для навчання, розвитку та відпочинку</h1>
                <p>Навчальний сайт з каталогом книг, категоріями та простою адмін-панеллю.</p>
                <a class="btn" href="#books">Переглянути каталог</a>
            </div>
        </div>

        <div class="section-heading" id="books">
            <h2><?= $search ? 'Результати пошуку' : 'Популярні книги'; ?></h2>
            <span><?= $search ? 'Запит: ' . e($search) : 'Усі товари з бази даних'; ?></span>
        </div>

        <div class="book-grid">
            <?php $books = get_books($search); ?>
            <?php foreach ($books as $book): ?>
                <article class="book-card">
                    <a class="book-image" href="book.php?book_id=<?= $book['id']; ?>">
                        <img src="<?= e($book['image']); ?>" alt="<?= e($book['title']); ?>">
                    </a>
                    <div class="book-card-body">
                        <p class="category-name"><?= e($book['category_title']); ?></p>
                        <h3><?= e($book['title']); ?></h3>
                        <p class="author"><?= e($book['author']); ?></p>
                        <p class="book-description"><?= e(short_text($book['description'], 95)); ?></p>
                        <div class="card-bottom">
                            <strong><?= number_format($book['price'], 2, '.', ' '); ?> грн</strong>
                            <a class="btn btn-small" href="book.php?book_id=<?= $book['id']; ?>">Детальніше</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (!$books): ?>
            <p>За вашим запитом нічого не знайдено.</p>
        <?php endif; ?>
    </section>
</main>

<?php include_once 'footer.php'; ?>
