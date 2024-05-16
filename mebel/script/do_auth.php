<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $user = 'root';
    $password = '';

    $conn = new PDO ('mysql:localhost=host;dbname=test', $user, $password);
    //получаем данные из формы
    $login = $_POST['login'];
    $password = $_POST['password'];
    print_r($_POST);
    //проверка на предмет отправки пустых полей не нужна!!!
    //лучше ли испольовать email в качестве логина, не зря же он уникальный 
    if ($_POST['login'] === '' || $_POST['password'] === ''){
        echo '';
    }
    //получаем данные из таблицы
    else{
        $sql = "SELECT * FROM `users` WHERE `login` = :login AND `password` = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<br>";
        print_r($users);//
        echo "<br>";
        print_r(count($users));//
        if(count($users)>0){//в чем смысл??? кроме того что они в сессии
            //так как же будет в конечном счете проходить проверка на уникальность пользователя???
            session_start();
            $_SESSION['id'] = $users[0]['id'];
            $_SESSION['name'] = $users[0]['name'];
            $_SESSION['login'] = $users[0]['login'];
            $_SESSION['email'] = $users[0]['email'];
            $_SESSION['password'] = $users[0]['password'];
            $_SESSION['user_is_admin'] = $users[0]['is_admin'];
            header ('Location: ../index.php');
        }
        else{
            echo "<br>Такого пользователя не существует";
            ?>
            <script>
                setTimeout(function(){
                    window.location.href="../auth.php";
                },5000);
            </script>
            <?php
        }
    }
    ?>
</body>
</html>