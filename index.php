<?php
    include_once 'header.php';

    $search = trim($_GET['search'] ?? '');
    $page = (int)($_GET['page'] ?? 1);
    $page = max(1, $page);
    $books_per_page = 12;
    $total_books = count_books($search);
    $total_pages = max(1, (int)ceil($total_books / $books_per_page));
    $page = min($page, $total_pages);
    $offset = ($page - 1) * $books_per_page;
    $books = get_books($search, $books_per_page, $offset);
?>

<main class="container shop-layout">
    <aside class="catalog-sidebar">
        <h2>Каталог</h2>
        <?php foreach ($categories as $category): ?>
            <a href="category.php?category_id=<?= $category['id']; ?>">
                <?= htmlspecialchars($category['title']); ?>
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
            <span>
                <?= $search
                    ? 'Запит: ' . htmlspecialchars($search)
                    : 'Усі товари з бази даних'; ?>
            </span>
        </div>

        <?php if ($books): ?>
            <div class="book-grid">
            <?php foreach ($books as $book): ?>
                <article class="book-card">
                    <a class="book-image" href="book.php?book_id=<?= $book['id']; ?>">
                        <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    </a>
                    <div class="book-card-body">
                        <p class="category-name"><?= htmlspecialchars($book['category_title']); ?></p>
                        <h3><?= htmlspecialchars($book['title']); ?></h3>
                        <p class="author"><?= htmlspecialchars($book['author']); ?></p>
                        <p class="book-description"><?= htmlspecialchars(short_text($book['description'], 95)); ?></p>
                        <div class="card-bottom">
                            <strong><?= number_format($book['price'], 2, '.', ' '); ?> грн</strong>
                            <a class="btn btn-small" href="book.php?book_id=<?= $book['id']; ?>">Детальніше</a>
                        </div>
                        <form class="cart-form" action="add-to-cart.php" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                            <button class="btn btn-small btn-cart" type="submit">Додати до кошика</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
            </div>

            <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a class="<?= $i === $page ? 'active' : ''; ?>" href="index.php?page=<?= $i; ?><?= $search ? '&search=' . urlencode($search) : ''; ?>#books"><?= $i; ?></a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="empty-state">
                <h3>Книги не знайдено</h3>
                <p>Спробуйте змінити запит або переглянути каталог за категоріями.</p>
                <a class="btn" href="index.php">Показати всі книги</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include_once 'footer.php'; ?>
