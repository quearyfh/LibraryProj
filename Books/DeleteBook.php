<?php
// the php file that deletes books from my sql database
include("..\Connection.php"); // connects to database
require('..\ValidAdmin.php');
$ISBN = $_GET['ISBN']; // gets the ISBN from the url

$sql = "delete from book where ISBN = '$ISBN';"; // deletes book from database based on ISBN
if (mysqli_query($conn, $sql)) { // if the statement works
    echo "<script type=\"text/javascript\"> alert(\"The book has been removed!\"); </script>"; // alerts the user it has been removed
    header("refresh:0.2; url=AdminBook.php"); // sends them back to admin
} else {
    echo "<script type=\"text/javascript\"> alert(\"The book has NOT been removed!\"); </script>"; // alerts that the book was not removed
    header("refresh:0.2; url=AdminBook.php"); // sends the user back to admin
}