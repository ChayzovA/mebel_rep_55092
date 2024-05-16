<?php
$favorites_id = (int)$_GET['id'];
echo "Пользователь хочет добавить из избранного $favorites_id";

session_start();
if (isset($_SESSION['order'])){
    $add_order = $_SESSION['order'];
    array_push($add_order, $favorites_id);
}
else{
    $add_order = $favorites_id;//почему здесь не массив?
}
$lastElementOfFavorite = (count($_SESSION['favorite'])-1);
unset($_SESSION['favorite'][$lastElementOfFavorite]);
print_r($_SESSION['favorite']);
$_SESSION['order'] = $add_order;

header("Location:../pro.php")
?>