<?php
    include_once '../function.php';
    check_admin();

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
<body class="form-page">
    <div class="admin-panel">
        <h1>Редагування книги</h1>
        <?php if ($book): ?>
            <form action="update-book.php" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                <input type="hidden" name="old_image" value="<?= e($book['image']); ?>">
                <div class="form-row">
                    <label>Назва книги</label>
                    <input type="text" name="title" value="<?= e($book['title']); ?>" required>
                </div>
                <div class="form-row">
                    <label>Автор</label>
                    <input type="text" name="author" value="<?= e($book['author']); ?>" required>
                </div>
                <div class="form-row">
                    <label>Опис книги</label>
                    <textarea name="description" required><?= e($book['description']); ?></textarea>
                </div>
                <div class="form-row">
                    <label>Ціна</label>
                    <input type="number" name="price" step="0.01" min="0" value="<?= e($book['price']); ?>" required>
                </div>
                <div class="form-row">
                    <label>Дата додавання</label>
                    <input type="date" name="created_at" value="<?= e($book['created_at']); ?>" required>
                </div>
                <div class="form-row">
                    <label>Категорія</label>
                    <select name="category_id" required>
                        <?php foreach (get_categories() as $category): ?>
                            <option value="<?= $category['id']; ?>" <?php if ($category['id'] == $book['category_id']) echo 'selected'; ?>>
                                <?= e($category['title']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <label>Нова обкладинка</label>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.webp">
                </div>
                <button class="btn" type="submit">Оновити книгу</button>
                <a class="btn btn-light" href="index.php">Назад</a>
            </form>
        <?php else: ?>
            <p>Книгу не знайдено.</p>
        <?php endif; ?>
    </div>
</body>
</html>
