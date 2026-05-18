<?php
    include_once 'function.php';
    $search = trim($_GET['search'] ?? '');
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Книжкова інтернет-крамниця</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header class="site-header">
    <div class="top-line">
        <div class="container top-line-inner">
            <span>Навчальний проєкт з вебтехнологій</span>
            <span>Пн-Пт: 9:00-18:00</span>
        </div>
    </div>

    <div class="container header-main">
        <a class="logo" href="index.php">
            <span class="logo-mark">К</span>
            <span>Книжкова<br>крамниця</span>
        </a>

        <form class="search-form" action="index.php" method="get">
            <input type="text" name="search" value="<?= e($search); ?>" placeholder="Пошук книг, авторів, категорій">
            <button type="submit">Знайти</button>
        </form>

        <div class="header-contact">
            <span>Консультація</span>
            <strong>+38 (000) 000-00-00</strong>
        </div>
    </div>

    <nav class="main-nav">
        <div class="container nav-inner">
            <a class="catalog-link" href="index.php">Каталог книг</a>
            <a href="index.php">Головна</a>
            <a href="about.php">Про магазин</a>
            <a href="delivery.php">Доставка та оплата</a>
            <?php $categories = get_categories(); ?>
            <?php foreach ($categories as $category): ?>
                <a href="category.php?category_id=<?= $category['id']; ?>"><?= e($category['title']); ?></a>
            <?php endforeach; ?>
            <a href="cart.php">Кошик (<?= cart_count(); ?>)</a>
            <a href="login/index.php">Адмінка</a>
        </div>
    </nav>
</header>
