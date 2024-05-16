<?php
session_start();
if (isset($_POST['logout'])){
        unset($_SESSION['login']);

$_SESSION['user_out'] = true;//флаг

session_destroy();

header("Location:../index.php");
exit();
}
?>