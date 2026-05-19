<?php
    include_once 'header.php';
    $order = $_SESSION['last_order'] ?? null;
?>

<main class="container content-page">
    <section class="text-page">
        <h1>Замовлення прийнято</h1>

        <?php if ($order): ?>
            <p>Дякуємо, <?= e($order['name']); ?>! Ваше замовлення успішно оформлено.</p>
            <p><strong>Телефон:</strong> <?= e($order['phone']); ?></p>
            <p><strong>Email:</strong> <?= e($order['email']); ?></p>
            <p><strong>Адреса:</strong> <?= nl2br(e($order['address'])); ?></p>
            <p><strong>Сума замовлення:</strong> <?= number_format($order['total'], 2, '.', ' '); ?> грн</p>
            <p>Це демонстраційне оформлення, тому дані не надсилаються менеджеру магазину.</p>
        <?php else: ?>
            <p>Інформацію про останнє замовлення не знайдено.</p>
        <?php endif; ?>

        <a class="btn" href="index.php">Повернутися до каталогу</a>
    </section>
</main>

<?php include_once 'footer.php'; ?>
