<?php
session_start();
if(isset($_SESSION['favorite'])){
    $_SESSION['favorite'] = [];
}
header('Location:../fav.php')
?>