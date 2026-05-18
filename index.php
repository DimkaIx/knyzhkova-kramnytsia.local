<?php include_once 'header.php'; ?>

<section class="hero">
    <div class="container">
        <h1>Книжкова інтернет-крамниця</h1>
        <p>Навчальний сайт для продажу художньої, навчальної та дитячої літератури.</p>
    </div>
</section>

<main class="container page-grid">
    <section>
        <h2>Усі книги</h2>
        <div class="book-grid">
            <?php $books = get_books(); ?>
            <?php foreach ($books as $book): ?>
                <article class="book-card">
                    <a href="book.php?book_id=<?= $book['id']; ?>">
                        <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    </a>
                    <div class="book-card-body">
                        <p class="category-name"><?= htmlspecialchars($book['category_title']); ?></p>
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
    </section>

    <aside class="sidebar">
        <div class="side-block">
            <h3>Категорії</h3>
            <?php foreach ($categories as $category): ?>
                <a href="category.php?category_id=<?= $category['id']; ?>"><?= htmlspecialchars($category['title']); ?></a>
            <?php endforeach; ?>
        </div>
        <div class="side-block">
            <h3>Про магазин</h3>
            <p>У каталозі зібрані книги для навчання, відпочинку та розвитку. Проєкт створено як лабораторну роботу.</p>
        </div>
    </aside>
</main>

<?php include_once 'footer.php'; ?>
