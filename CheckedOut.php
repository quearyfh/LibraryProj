<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$dateoption = $_POST['returndate'];
$ucard = $_SESSION["ucard"];
if ($dateoption=="4"){
    $datereturned = time() + (28 * 24 * 60 * 60);
}else{
    $datereturned = time() + (7 * 24 * 60 * 60);
}
$date= date('Y-m-d', $datereturned);


$sql = "update book set copies= copies-1 where ISBN=$ISBN;";
mysqli_query($conn, $sql);
$sql = "delete from cart where ISBN = '$ISBN';";
mysqli_query($conn, $sql);
$sql = "insert into checkout (ucard, ISBN, dateReturn) VALUES('$ucard','$ISBN', '$date');";


if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been checked out!\"); </script>";
    header("refresh:0; url=Checkout.php");
}