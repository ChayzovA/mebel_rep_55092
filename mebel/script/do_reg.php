<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<script>
    function redirectToReg(redirectUrl){
        var timer = 10;
        function updateTimer(){
            document.getElementById('timer').innerText = timer;

            if(timer === 0){
                window.location.href = redirectUrl;
            }
            else{
                timer--;
                setTimeout(updateTimer, 1000);
            }
        }
        updateTimer();
    }
</script>
</head>
<body>
    <?php
    $user="root";
    $password="";

    $conn = new PDO("mysql:host=localhost;dbname=test", $user, $password);
    //передача данных из формы в переменную пост
    $name=$_POST["name"];
    $login=$_POST['login'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    //проверка на пустые поля
    if ($login === '' || $password === ''){
        echo "Заполните все поля";
    }
    //если все зполненно, достаем из БД почту для проверки на идентичность
    else{ 
    $sql = "SELECT * from `users` WHERE `email` = :email OR `login` = :login";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":login", $login);//понять это!!!
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    if(count($users)>0){
        ?>
        <p>Попробуйте снова <span id="timer">10</span></p>
        <script>
            redirectToReg("../reg.php");
        </script>
        <?php
        die ("email уже существует");
    }
    //передача данных в таблицу
    else{
        $sql = "INSERT INTO users (name, login, email, password) VALUES (:name, :login, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        
        $stringCount = $stmt->execute();
    }
    if($stringCount>0){
        ?>
        <p>Авторизация <span id="timer">10</span></p>
        <script>
            redirectToReg("../auth.php");
        </script>
        <?php
        echo "Данные " .$name. " " .$login. " " .$email. " добавленны успешно";
    }
    }
    ?>
</body>
</html>


