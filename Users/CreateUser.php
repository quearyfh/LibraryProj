<?php
include("..\Connection.php");
session_start();
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$status = "User";
$ucard = rand(1000000, 1999999);


$sql = "insert into member (fname, lname, email, Ucard, Phone, address, status) VALUES('$fname','$lname','$email', '$ucard', '$phone', '$address', '$status');";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The member has been added!\"); </script>";
    $_SESSION["status"] = "User";
    $_SESSION["ucard"] = $ucard;
    header("refresh:0.2; url=..\Home.php");
}