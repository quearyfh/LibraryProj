<?php
// actually adds the book to the cart
session_start();// how I get session variables
include("Connection.php"); // get my database connected
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];
$status = $_SESSION["status"];

$sql = "select ISBN from cart where ISBN=$ISBN and ucard='$ucard';"; // selects the books where ISBN and user match from cart
$count= mysqli_query($conn, $sql);
if (mysqli_num_rows($count) !=0 ){ // if they match, that means they already have the book checked out
    echo "<script type=\"text/javascript\"> alert(\"You may not check out multiple copies of the same book!\"); </script>"; // alerts the user they can't have two copies
    header("refresh:0.2; url=Catalog.php"); // sends them back to the catalog if they try this
}
else{ // if they don't already have the book


$sql = "select ISBN from cart where ucard='$ucard';"; // selects all books the user has checked out
$result = mysqli_query($conn, $sql);
if ((mysqli_num_rows($result) >= 6 && $status=='User') || (mysqli_num_rows($result) >= 12 && $status=='admin')){ // checks if they have too many in card
    echo "<script type=\"text/javascript\"> alert(\"You have reached your limit of books have in cart. You must checkout a book before you add anymore!\"); </script>"; // alerts them if they do 
    header("refresh:0.2; url=Checkout.php");
}
else{// if they are below limit
    $sql = "update book set copies= copies-1 where ISBN=$ISBN;"; // subtracts 1 from the copies of the book
    mysqli_query($conn, $sql);
    $sql2 = "insert into cart (ISBN,ucard) VALUES('$ISBN', '$ucard');"; // insters book into checked out 
    if (mysqli_query($conn, $sql2)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been added to your cart!\"); </script>"; // alerts user they have checked out the book
        header("refresh:0.2; url=Checkout.php");// sends them to the checkout in case they have more books
    }
}
}

