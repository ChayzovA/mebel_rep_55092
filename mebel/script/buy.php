<?php
session_start();
if(isset($_SESSION['order'])){
    $_SESSION['order'] = [];
}
header('Location:../pro.php')
?>