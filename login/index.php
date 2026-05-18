<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вхід в адмін-панель</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="form-page">
    <div class="admin-panel">
        <h1>Вхід в адмін-панель</h1>
        <form action="check-login.php" method="post">
            <div class="form-row">
                <label>Логін</label>
                <input type="text" name="login" required>
            </div>
            <div class="form-row">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>
            <button class="btn" type="submit">Увійти</button>
            <a class="btn btn-light" href="../index.php">На сайт</a>
        </form>
    </div>
</body>
</html>
