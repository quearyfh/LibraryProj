<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];

$sql = "update book set copies= copies+1 where ISBN=$ISBN;";
mysqli_query($conn, $sql);

$sql = "delete from cart where ucard = '$ucard' AND ISBN='$ISBN';";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been removed from your cart!\"); </script>";
    header("refresh:0.2; url=Checkout.php");
}