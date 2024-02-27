<?php
// will create members on the admin standpoint
include("..\Connection.php"); // connection to database
session_start();
$fname = $_POST["fname"]; // all the varibales from the sign up form
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$status = $_POST["status"]; // automatically makes them normal user not admin
$ucard = rand(1000000, 1999999); // assigns them a random ucard


$sql = "insert into member (fname, lname, email, Ucard, Phone, address, status) VALUES('$fname','$lname','$email', '$ucard', '$phone', '$address', '$status');";
//^^ inserts member into member table
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The member has been added!\"); </script>";// alerts the user they are added
    header("refresh:0.2; url=AdminUsers.php"); // auto takes them to the home oage
}