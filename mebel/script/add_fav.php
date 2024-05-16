<?php
$fid = (int)$_GET['id'];
echo "User wants add to favorite a product $fid";

session_start();
if(isset($_SESSION['favorite'])){
    $favorite = $_SESSION['favorite'];
}
else{
    $favorite = [];
}
echo "<br><hr>"; 
print_r($_SESSION);

if (in_array($fid, $favorite)){
    echo "Product are exist";
}
else {
    $favorite[]=$fid;
    echo 'Add to favorites';
}
$_SESSION['favorite'] = $favorite;
echo "<br><hr>";
print_r($_SESSION['favorite']);
header('Location:../fav.php');
?>
<a href="../fav.php">Favorite</a>