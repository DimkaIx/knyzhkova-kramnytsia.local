<?php
    include_once '../function.php';

    if (($_SESSION['login'] ?? '') !== 'admin' || ($_SESSION['password'] ?? '') !== '12345') {
        header('location: ../login/index.php');
        exit();
    }
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Додавання книги</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="form-page">
    <div class="admin-panel">
        <h1>Додавання книги</h1>
        <form action="check-book.php" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-row">
                <label>Назва книги</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-row">
                <label>Автор</label>
                <input type="text" name="author" required>
            </div>
            <div class="form-row">
                <label>Опис книги</label>
                <textarea name="description" required></textarea>
            </div>
            <div class="form-row">
                <label>Ціна</label>
                <input type="number" name="price" step="0.01" min="0" required>
            </div>
            <div class="form-row">
                <label>Мова оригіналу</label>
                <input type="text" name="original_language" placeholder="Наприклад: українська">
            </div>
            <div class="form-row">
                <label>Переклад українською</label>
                <input type="text" name="ukrainian_translation" placeholder="Наприклад: оригінал українською">
            </div>
            <div class="form-row">
                <label>Видавництво</label>
                <input type="text" name="publisher">
            </div>
            <div class="form-row">
                <label>Дата видання</label>
                <input type="date" name="published_at">
            </div>
            <div class="form-row">
                <label>Кількість сторінок</label>
                <input type="number" name="pages" min="0">
            </div>
            <div class="form-row">
                <label>ISBN</label>
                <input type="text" name="isbn">
            </div>
            <div class="form-row">
                <label>Дата додавання</label>
                <input type="date" name="created_at" required>
            </div>
            <div class="form-row">
                <label>Категорія</label>
                <select name="category_id" required>
                    <option value="">Оберіть категорію</option>
                    <?php foreach (get_categories() as $category): ?>
                        <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-row">
                <label>Обкладинка</label>
                <input type="file" name="image">
            </div>
            <button class="btn" type="submit">Додати книгу</button>
            <a class="btn btn-light" href="index.php">Назад</a>
        </form>
    </div>
</body>
</html>
