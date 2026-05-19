<?php
    include_once 'header.php';

    $cart = $_SESSION['cart'] ?? [];
    $total = 0;

    foreach ($cart as $book_id => $quantity) {
        $book = get_book_by_id($book_id);
        if ($book) {
            $total += $book['price'] * $quantity;
        }
    }
?>

<main class="container content-page">
    <section class="text-page checkout-page">
        <h1>Оформлення замовлення</h1>

        <?php if ($cart && $total > 0): ?>
            <p>Заповніть коротку форму. У цьому навчальному проєкті замовлення не відправляється на пошту, а тільки показує приклад роботи форми.</p>

            <form action="process-order.php" method="post">
                <?= csrf_field(); ?>
                <div class="form-row">
                    <label>Ваше ім'я</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-row">
                    <label>Телефон</label>
                    <input type="text" name="phone" required>
                </div>
                <div class="form-row">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-row">
                    <label>Адреса доставки</label>
                    <textarea name="address" required></textarea>
                </div>
                <div class="form-row">
                    <label>Коментар до замовлення</label>
                    <textarea name="comment"></textarea>
                </div>

                <div class="checkout-total">
                    <span>До сплати:</span>
                    <strong><?= number_format($total, 2, '.', ' '); ?> грн</strong>
                </div>

                <button class="btn" type="submit">Підтвердити замовлення</button>
                <a class="btn btn-light" href="cart.php">Назад до кошика</a>
            </form>
        <?php else: ?>
            <div class="empty-cart">
                <h2>Кошик порожній</h2>
                <p>Спочатку додайте книгу до кошика.</p>
                <a class="btn" href="index.php">До каталогу</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include_once 'footer.php'; ?>
