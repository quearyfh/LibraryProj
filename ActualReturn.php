<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];



$sql = "update book set copies= copies+1 where ISBN=$ISBN;";
mysqli_query($conn, $sql);
$sql = "delete from checkout where ISBN = '$ISBN' and ucard='$ucard';";
mysqli_query($conn, $sql);


if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been returned!\"); </script>";
    header("refresh:0.2; url=ReturnBook.php");
}