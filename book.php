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
            <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
            <div>
                <p class="category-name"><?= htmlspecialchars($book['category_title']); ?></p>
                <h1><?= htmlspecialchars($book['title']); ?></h1>
                <p class="author">Автор: <?= htmlspecialchars($book['author']); ?></p>
                <p class="price"><?= number_format($book['price'], 2, '.', ' '); ?> грн</p>
                <p><?= nl2br(htmlspecialchars($book['description'])); ?></p>
                <dl class="book-details">
                    <div>
                        <dt>Мова оригіналу</dt>
                        <dd><?= htmlspecialchars($book['original_language'] ?: 'не вказано'); ?></dd>
                    </div>
                    <div>
                        <dt>Переклад українською</dt>
                        <dd><?= htmlspecialchars($book['ukrainian_translation'] ?: 'не вказано'); ?></dd>
                    </div>
                    <div>
                        <dt>Видавництво</dt>
                        <dd><?= htmlspecialchars($book['publisher'] ?: 'не вказано'); ?></dd>
                    </div>
                    <div>
                        <dt>Дата видання</dt>
                        <dd><?= !empty($book['published_at']) ? date('d.m.Y', strtotime($book['published_at'])) : 'не вказано'; ?></dd>
                    </div>
                    <div>
                        <dt>Сторінок</dt>
                        <dd><?= (int)$book['pages'] ?: 'не вказано'; ?></dd>
                    </div>
                    <div>
                        <dt>ISBN</dt>
                        <dd><?= htmlspecialchars($book['isbn'] ?: 'не вказано'); ?></dd>
                    </div>
                </dl>
                <p><strong>Дата додавання:</strong> <?= date('d.m.Y', strtotime($book['created_at'])); ?></p>
                <form class="cart-form cart-form-wide" action="add-to-cart.php" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                    <button class="btn" type="submit">Додати до кошика</button>
                    <a class="btn btn-light" href="index.php">Повернутися назад</a>
                </form>
            </div>
        </article>
    <?php else: ?>
        <h1>Книгу не знайдено</h1>
        <p>Можливо, запис було видалено з каталогу.</p>
    <?php endif; ?>
</main>

<?php include_once 'footer.php'; ?>
