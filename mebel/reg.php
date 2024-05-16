<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/favicon.png">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="script/script.js"></script>
    <title>Регистрация</title>
</head>
<body>
<header>
        <div class="nav">
            <img class="logo" src="img/logo.png" alt="logo">
            <div class="hamburger-menu" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="menu">
                <a href="index.php">Главная</a>
                <a href="pro.php">Корзина</a>
                <a href="fav.php">Избранное</a>
                <a href="#">Решения</a>
                <a href="#">Контакты</a>
            </div>
        </div>
    </header>

    <nav>
        <a href="index.php">Главная</a>
        <a href="pro.php">Корзина</a>
        <a href="fav.php">Избранное</a>
        <a href="#">Решения</a>
        <a href="#">Контакты</a>
    </nav>

    <article>
        <div class="nav2">
            <h2>Регистрация</h1>
        </div>

        <div class="reg-form-wrapper">
            <form action="script/do_reg.php" method="POST">
                <label for="name">Имя</label>
                    <input name="name" type="text" id="name" placeholder="name">
                <label for="login">Логин</label>
                    <input name="login" type="text" id="login" placeholder="login" required>
                <label for="email">Почта</label>
                    <input name="email" type="email" id="email" placeholder="email">
                <label for="password">Пароль</label>
                    <input name="password" type="password" id="password" placeholder="password" required>
                
                    <input class="button-link" type="submit" value="Регистрация">
            </form>
            <a href="auth.php" class="">Авторизация</a>
        </div>
        </article>

        <footer>
        <div class="footer">
            <h3>Интерьер</h3>
            <h3>Подпишитесь на новости</h3>
            <p>Оставьте свой email и вы будете получать актуальную информацию о наших акциях и новинках</p>
        </div>
        <div class="subscr">
            <input type="email" placeholder = "Введите email">
            <button>Подписаться</button>
        </div>
    </footer>
    
</body>
</html>