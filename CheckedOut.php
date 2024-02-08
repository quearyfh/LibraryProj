<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];
$nextWeek = time() + (7 * 24 * 60 * 60);
$date= date('Y-m-d', $nextWeek);


$sql = "update book set copies= copies-1 where ISBN=$ISBN;";
mysqli_query($conn, $sql);
$sql = "delete from cart where ISBN = '$ISBN';";
mysqli_query($conn, $sql);
$sql = "insert into checkout (ucard, ISBN, dateReturn) VALUES('$ucard','$ISBN', '$date');";


if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been altered\"); </script>";
    header("refresh:0.2; url=Checkout.php");
}