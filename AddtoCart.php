<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$ucard = $_SESSION["ucard"];

$sql = "select ISBN from cart where ISBN=$ISBN and ucard='$ucard';";
$count= mysqli_query($conn, $sql);
if (mysqli_num_rows($count) !=0 ){
    echo "<script type=\"text/javascript\"> alert(\"You may not check out multiple copies of the same book!\"); </script>";
    header("refresh:0.2; url=Catalog.php");
}
else{

$sql = "update book set copies= copies-1 where ISBN=$ISBN;";
mysqli_query($conn, $sql);

$sql = "select ISBN from cart where ucard='$ucard';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 6){
    echo "<script type=\"text/javascript\"> alert(\"You have reached your limit of books have in cart. You must checkout a book before you add anymore!\"); </script>";
    header("refresh:0.2; url=Checkout.php");
}
else{
    $sql2 = "insert into cart (ISBN,ucard) VALUES('$ISBN', '$ucard');";
    if (mysqli_query($conn, $sql2)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been added to your cart!\"); </script>";
        header("refresh:0.2; url=Checkout.php");
    }
}
}

