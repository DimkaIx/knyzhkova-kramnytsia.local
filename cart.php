<?php
    include_once 'header.php';

    $cart = $_SESSION['cart'] ?? [];
    $cart_books = [];
    $total = 0;

    foreach ($cart as $book_id => $quantity) {
        $book = get_book_by_id($book_id);
        if ($book) {
            $book['quantity'] = (int)$quantity;
            $book['sum'] = $book['price'] * $book['quantity'];
            $total += $book['sum'];
            $cart_books[] = $book;
        }
    }
?>

<main class="container content-page">
    <section class="text-page cart-page">
        <h1>Кошик</h1>

        <?php if ($cart_books): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Книга</th>
                    <th>Ціна</th>
                    <th>Кількість</th>
                    <th>Сума</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cart_books as $book): ?>
                    <tr>
                        <td>
                            <strong><?= e($book['title']); ?></strong><br>
                            <span class="author"><?= e($book['author']); ?></span>
                        </td>
                        <td><?= number_format($book['price'], 2, '.', ' '); ?> грн</td>
                        <td>
                            <form class="quantity-form" action="update-cart.php" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                                <input type="number" name="quantity" value="<?= $book['quantity']; ?>" min="1" max="20">
                                <button class="btn btn-small" type="submit">Оновити</button>
                            </form>
                        </td>
                        <td><?= number_format($book['sum'], 2, '.', ' '); ?> грн</td>
                        <td>
                            <form action="remove-from-cart.php" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                                <button class="btn btn-small btn-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-total">
                <span>Разом:</span>
                <strong><?= number_format($total, 2, '.', ' '); ?> грн</strong>
            </div>
            <div class="cart-actions">
                <a class="btn btn-light" href="index.php">Продовжити покупки</a>
                <a class="btn" href="checkout.php">Оформити замовлення</a>
            </div>
        <?php else: ?>
            <div class="empty-cart">
                <h2>Ваш кошик порожній</h2>
                <p>Перейдіть до каталогу та оберіть книгу, яка вас зацікавила.</p>
                <a class="btn" href="index.php">До каталогу</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include_once 'footer.php'; ?>
