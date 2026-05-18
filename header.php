<?php
    include_once 'function.php';
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
    <div class="container header-inner">
        <a class="logo" href="index.php">Книжкова крамниця</a>
        <nav class="menu">
            <a href="index.php">Головна</a>
            <?php $categories = get_categories(); ?>
            <?php foreach ($categories as $category): ?>
                <a href="category.php?category_id=<?= $category['id']; ?>"><?= htmlspecialchars($category['title']); ?></a>
            <?php endforeach; ?>
            <a href="login/index.php">Адмінка</a>
        </nav>
    </div>
</header>
