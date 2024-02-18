<?php
session_start();
include("..\Connection.php");
$ISBN = $_GET['ISBN'];

$sql = "delete from book where ISBN = '$ISBN';";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been removed!\"); </script>";
    header("refresh:0.2; url=AdminBook.php");
} else {
    echo "<script type=\"text/javascript\"> alert(\"The book has NOT been removed!\"); </script>";
    header("refresh:0.2; url=AdminBook.php");
}