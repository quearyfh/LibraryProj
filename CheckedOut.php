<?php
// the file that actually puts the book from cart to checked out
session_start(); // to get the session variables
include("Connection.php"); //connects to database
$ISBN = $_GET['ISBN'];
$dateoption = $_POST['returndate'];// from my form
$ucard = $_SESSION["ucard"];
$status = $_SESSION["status"];

if ($dateoption=="4"){
    $datereturned = time() + (28 * 24 * 60 * 60); // sets the date for 4 weeks from today
}else{
    $datereturned = time() + (7 * 24 * 60 * 60); // sets the date for 1 week from today
}
$date= date('Y-m-d', $datereturned);// puts the date in the format for sql


$sql = "select ISBN from checkout where ucard='$ucard';"; // selects the ISBN from so I can check how many books they have
$result = mysqli_query($conn, $sql);
if ((mysqli_num_rows($result) >= 6 && $status=='User') || (mysqli_num_rows($result) >= 12 && $status=='admin')){ // limits the amount of books the user can check out
    echo "<script type=\"text/javascript\"> alert(\"You have reached your limit of books checked out. You must return a book before you can checkout anymore!\"); </script>"; // alert user if over limit
    header("refresh:0.2; url=ReturnBook.php"); // if they have too many books checked out, it will return them to the return books page 
}
else{
    $sql = "delete from cart where ISBN = '$ISBN';"; // if they are within limit, then the book is deleted from the cart
    mysqli_query($conn, $sql);
    $sql = "insert into checkout (ucard, ISBN, dateReturn) VALUES('$ucard','$ISBN', '$date');";// the book is them added to the checked out table
    if (mysqli_query($conn, $sql)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been checked out!\"); </script>"; //alerts the user that the book is checked out
        header("refresh:0.2; url=Checkout.php");// will send them to the cart page to see the the book is no longer there
}

}

