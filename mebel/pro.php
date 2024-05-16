<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/favicon.png">
    <script src="script/script.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <title>Корзина</title>
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
                <a class="head-auth" href="reg.php">Регистрация</a>
                <a class="head-auth" href="auth.php">Авторизация</a>
            </div>
        </div>
</header>

    <nav>
        <a href="index.php">Главная</a>
        <a href="pro.php">Корзина</a>
        <a href="fav.php">Избранное</a>
        <a href="#">Решения</a>
        <a href="#">Контакты</a>
        <a class="head-auth" href="reg.php">Регистрация</a>
        <a class="head-auth" href="auth.php">Авторизация</a>
    </nav>
    
<article>
        <div class="nav2">
            <h2>Корзина</h1>
            <img class="img-buscket" src="img/cart.png"/>

                <div class="nav3">
                    <a href="fav.php">Избранное</a>
                </div>
        </div>
        
    <?php
    $user = 'root';
    $password = "";

    $conn = new PDO("mysql:host=localhost;dbname=test", $user, $password);

    session_start();
    if (isset($_SESSION['order'])){
        $order = $_SESSION['order'];
    }
    else{
        $order = [];
    }
    ?>
    <div class="buscket">
        <?php
        for ($i = 0; $i < count($order); $i++){
            $sql = "SELECT * FROM `products` WHERE `id` = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $order[$i]);
            $stmt->execute();
            $object = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="buscket-product">
                <div><?php echo $object['title'];?></div>
                <div><?php echo $object['price'];?> ₽</div>
                <img src="<?php echo $object['img'];?>"/>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="bbutton">
        <a href="script/buy.php" class="button-link">Купить</a>
        <?php
        if (empty($_SESSION['order'])){
            echo "Ваша корзина пуста";
            echo "<style>
                .button-link{
                    display: none;
                    }
                    </style>";
        }
        ?>
    </div>
    <div class="empty-cart" style="display: none;">Ваша корзина пуста</div>
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