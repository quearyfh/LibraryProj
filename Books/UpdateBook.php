<?php
include("..\Connection.php");
$OGISBN = $_GET['ISBN'];
$title = $_POST["title"];
$author = $_POST["author"];
$ISBN = $_POST["ISBN"];
$copies = $_POST["copies"];
$genre = $_POST["genre"];
$img = $_POST["img"];

$sql = "update book set title='$title',author='$author',ISBN='$ISBN',copies='$copies', genre='$genre', img='$img' where ISBN='$OGISBN';";
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"The book has been changed!\"); </script>";
header("refresh:0.2; url=AdminBook.php");