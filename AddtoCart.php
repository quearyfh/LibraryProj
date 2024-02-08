<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];

$sql = "insert into cart (ISBN,ucard) VALUES('$ISBN', '$ucard');";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been added to your cart!\"); </script>";
    header("refresh:0.2; url=Catalog.php");
}