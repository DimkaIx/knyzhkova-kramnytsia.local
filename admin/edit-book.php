<?php
    include_once '../function.php';

    if (($_SESSION['login'] ?? '') !== 'admin' || ($_SESSION['password'] ?? '') !== '12345') {
        header('location: ../login/index.php');
        exit();
    }

    $book_id = $_GET['book_id'] ?? 0;
    if (!is_numeric($book_id)) {
        exit('Невірний номер книги');
    }

    $book = get_book_by_id($book_id);
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редагування книги</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="form-page admin-edit-page">
    <div class="admin-panel admin-edit-panel">
        <?php if ($book): ?>
            <?php $image_src = preg_match('/^https?:\/\//', $book['image']) ? $book['image'] : '../' . $book['image']; ?>
            <div class="admin-edit-title">
                <div>
                    <p class="category-name">Адмін-панель</p>
                    <h1>Редагування книги</h1>
                </div>
                <a class="btn btn-light" href="index.php">Назад</a>
            </div>

            <form class="admin-edit-form" action="update-book.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                <input type="hidden" name="old_image" value="<?= htmlspecialchars($book['image']); ?>">
                <input type="hidden" name="created_at" value="<?= $book['created_at']; ?>">

                <aside class="admin-edit-cover">
                    <img src="<?= htmlspecialchars($image_src); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    <div class="form-row">
                        <label>Нова обкладинка</label>
                        <input type="file" name="image">
                    </div>
                    <button class="btn" type="submit">Оновити книгу</button>
                </aside>

                <section class="admin-edit-fields">
                    <div class="form-section">
                        <h2>Основна інформація</h2>
                        <div class="form-grid">
                            <div class="form-row form-row-wide">
                                <label>Назва книги</label>
                                <input type="text" name="title" value="<?= htmlspecialchars($book['title']); ?>" required>
                            </div>
                            <div class="form-row">
                                <label>Автор</label>
                                <input type="text" name="author" value="<?= htmlspecialchars($book['author']); ?>" required>
                            </div>
                            <div class="form-row">
                                <label>Категорія</label>
                                <select name="category_id" required>
                                    <?php foreach (get_categories() as $category): ?>
                                        <option value="<?= $category['id']; ?>" <?php if ($category['id'] == $book['category_id']) echo 'selected'; ?>>
                                            <?= htmlspecialchars($category['title']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-row">
                                <label>Ціна</label>
                                <input type="number" name="price" step="0.01" min="0" value="<?= $book['price']; ?>" required>
                            </div>
                            <div class="form-row form-row-wide">
                                <label>Опис книги</label>
                                <textarea name="description" required><?= htmlspecialchars($book['description']); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h2>Дані видання</h2>
                        <div class="form-grid">
                            <div class="form-row">
                                <label>Мова оригіналу</label>
                                <input type="text" name="original_language" value="<?= htmlspecialchars($book['original_language']); ?>">
                            </div>
                            <div class="form-row">
                                <label>Переклад українською</label>
                                <input type="text" name="ukrainian_translation" value="<?= htmlspecialchars($book['ukrainian_translation']); ?>">
                            </div>
                            <div class="form-row">
                                <label>Видавництво</label>
                                <input type="text" name="publisher" value="<?= htmlspecialchars($book['publisher']); ?>">
                            </div>
                            <div class="form-row">
                                <label>Дата видання</label>
                                <input type="date" name="published_at" value="<?= htmlspecialchars($book['published_at']); ?>">
                            </div>
                            <div class="form-row">
                                <label>Кількість сторінок</label>
                                <input type="number" name="pages" min="0" value="<?= (int)$book['pages']; ?>">
                            </div>
                            <div class="form-row">
                                <label>ISBN</label>
                                <input type="text" name="isbn" value="<?= htmlspecialchars($book['isbn']); ?>">
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        <?php else: ?>
            <p>Книгу не знайдено.</p>
        <?php endif; ?>
    </div>
</body>
</html>
