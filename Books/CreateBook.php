<?php 
// the php file for adding a book to my sql tabkes
include("..\Connection.php"); // connects to my database
$title = $_POST["title"]; // gettings all the posted values from my post form in AddBook.php
$author = $_POST["author"];
$ISBN = $_POST["ISBN"];
$copies = $_POST["copies"];
$genre = $_POST["genre"];
$img = $_POST["img"];

$sql = "insert into book (title, author, ISBN, copies, genre, img) VALUES('$title','$author','$ISBN', '$copies', '$genre', '$img');";
//^^ the sql statement to insert a new book
if (mysqli_query($conn, $sql)) { // if the sql result goes
    echo "<script type=\"text/javascript\"> alert(\"The book has been added!\"); </script>"; // an alert to tell them the book is added
    header("refresh:0.2; url=AdminBook.php");// redirects them to the AdminBook page
}