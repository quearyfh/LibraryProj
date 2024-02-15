<?php
session_start();
include("Connection.php");
$ISBN = $_GET['ISBN'];
$dateoption = $_POST['returndate'];
$ucard = $_SESSION["ucard"];
if ($dateoption=="4"){
    $datereturned = time() + (28 * 24 * 60 * 60);
}else{
    $datereturned = time() + (7 * 24 * 60 * 60);
}
$date= date('Y-m-d', $datereturned);


$sql = "select ISBN from checkout where ucard='$ucard';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 6){
    echo "<script type=\"text/javascript\"> alert(\"You have reached your limit of books checked out. You must return a book before you can checkout anymore!\"); </script>";
    header("refresh:0.2; url=ReturnBook.php");
}
else{
    $sql = "delete from cart where ISBN = '$ISBN';";
    mysqli_query($conn, $sql);
    $sql = "insert into checkout (ucard, ISBN, dateReturn) VALUES('$ucard','$ISBN', '$date');";


    if (mysqli_query($conn, $sql)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been checked out!\"); </script>";
        header("refresh:0.2; url=Checkout.php");
}

}

