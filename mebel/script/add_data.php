<?php
$user = "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=test", $user, $password);

$title = $_POST['title'];
$price = $_POST['price'];


if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK){//$_FILES["img"]массив//["error"]его ключ;
    print_r($_FILES);
    $file_name = $_FILES["img"]["name"];
    $tmp_name = $_FILES["img"]["tmp_name"];
    if($_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png"){
        move_uploaded_file($tmp_name, "../img/$file_name");
        $sql = "INSERT INTO `products` (`title`, `price`, `img`) VALUES (:title, :price, :img)";

        $full_name = "img/$file_name";//имя файла в БД
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':img', $full_name);
        $stringCount = $stmt->execute();

        if ($stringCount > 0) {
            echo "Данные успешно добавленны";
            
        }
    }
}
else{//добавление данных без картинки 
    print_r($_POST);

    $sql = "INSERT INTO `products` (`title`, `price`) VALUES (:title, :price)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':price', $price);

    $stringCount = $stmt->execute();

    if ($stringCount > 0) {
        echo "Данные успешно добавленны";
        
    }
}
header("Location:../add_product.php");

?>