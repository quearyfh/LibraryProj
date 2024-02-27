<?php
// file to actually get book out of checked out section
session_start(); // how I get variables
include("Connection.php"); // how I connect to database
$ISBN = $_GET['ISBN']; // get ISBN from URL
$ucard = $_SESSION["ucard"];

$sql = "update book set copies= copies+1 where ISBN=$ISBN;"; // updates the copies
mysqli_query($conn, $sql);
$sql = "delete from checkout where ISBN = '$ISBN' and ucard='$ucard';"; // deletes the book from the checkedout section
mysqli_query($conn, $sql);


if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The book has been returned!\"); </script>"; // alerts the user the book is returned
    header("refresh:0.2; url=ReturnBook.php"); // shows the returned book is gone
}

