<?php
// This file updates the database when a user removes a book from their cart
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN']; // gets ISBN from the URL
$ucard = $_SESSION["ucard"]; // from the session

$sql = "update book set copies= copies+1 where ISBN=$ISBN;"; // adds the copie back into the regular library database
mysqli_query($conn, $sql);

$sql = "delete from cart where ucard = '$ucard' AND ISBN='$ISBN';"; // deletes the book from the cart
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been removed from your cart!\"); </script>"; // alerts the user they have removed it 
    header("refresh:0.2; url=Checkout.php"); // returns then to the cart page
}
