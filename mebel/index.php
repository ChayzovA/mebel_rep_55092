<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">;
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="script/script.js"></script>
    <title>Интерьер</title>
</head>
<body>
    <?php
    session_start();
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=localhost;dbname=test",$username,$password);
    $sql = "SELECT * FROM `products`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
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
                <?php if (isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin']=='1') { ?>
                <a href="add_product.php">Добавить товар</a>
                <?php } ?>
                <a class="head-auth" href="reg.php">Регистрация</a>
                <a class="head-auth" href="auth.php">Авторизация</a>
            </div>
                <div class="user-info">
                    <?php                   
                    if (isset($_SESSION['login'])){
                        if (isset($_SESSION['user_is_admin'])==='1'){
                            echo "<img style='width:20px;height:20px;'src = 'img/user.png'>";
                            echo $_SESSION['login'];
                        }
                        else{
                            echo "<img style='width:20px;height:20px;'src = 'img/user.png'>";
                            echo $_SESSION['login'];
                        }
                    }
                    ?>
                    <?php if(isset($_SESSION['login']) && !isset($_SESSION['user_out'])){ ?>
                    <form action="script/do_exit.php" method="POST">
                        <input type="submit" name = "logout" value="Выход">
                    </form>
                    <?php } ?>
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
            <h2>Лучшие новинки</h1>
                <div class="nav3">
                    <button class="bnav">Мебель</button>
                    <button class="bnav">Свет</button>
                    <button class="bnav">Декор</button>
                </div>
        </div>
        <div class="table">
        <?php for($i=0; $i<count($products); $i++){
            ?>
            <div class="product">
                <?php echo $products[$i]["title"]?>
                <?php echo $products[$i]["price"]?> ₽
                
                <?php
                    $img = $products[$i]['img'];
                    if($img){
                        echo "<img src='$img'>";
                    }
                    else{
                        echo "<img src='img/stub.png'>";
                    }
                ?>
                    <div class="btn">
                    <?php
                        $id = $products[$i]["id"];
                        echo "<a class='baction' href='script/add_pro.php?id=$id'><i class='fas fa-shopping-cart'></i></a>";
                        echo "<a class='baction' onclick='toggleFav()' href='script/add_fav.php?id=$id'><i class='fas fa-star'></i></a>";
                    ?>
                    </div>
            </div>
        <?php
        } ?>
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