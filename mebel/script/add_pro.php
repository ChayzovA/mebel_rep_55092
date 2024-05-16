<?php
$product_id = (int)$_GET['id'];//получили ключ продукта 
echo "Пользователь хочет добавить товар $product_id";

session_start();
print_r($_SESSION);
if(isset($_SESSION['order'])){//если в сессии содержится заказ
    $order = $_SESSION['order'];//то 
    array_push($order, $product_id);//добавление нового заказа в конец чего?
}
//из чего в таком случае будет состоять массив order?
else{
    $order = [$product_id];//в случае если заказ больше не пополняется будет добавленна только одна мебель
}
$_SESSION['order'] = $order;//заказ записывается в переменную, зачем, ведь он итак записан в сессию, а здесь мы не используем его в отдельной переменной
print_r($_SESSION['order']);
header("Location:../pro.php")
?>
<a href="../pro.php">Buscket</a>
<a href= "../index.php">Main</a>
Сделать что-бы все добавлялось в корзину.
Сделать отображение самой корзины. 