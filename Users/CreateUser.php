<?php
include("..\Connection.php"); // connection to database
session_start();
$fname = $_POST["fname"]; // all the varibales from the sign up form
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$status = "User"; // automatically makes them normal user not admin
$ucard = rand(1000000, 1999999); // assigns them a random ucard


$sql = "insert into member (fname, lname, email, Ucard, Phone, address, status) VALUES('$fname','$lname','$email', '$ucard', '$phone', '$address', '$status');";
//^^ inserts member into member table
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The member has been added!\"); </script>";// alerts the user they are added
    $_SESSION["status"] = "User"; // asigns the user to session status
    $_SESSION["ucard"] = $ucard; // assigned their ucard to the session
    header("refresh:0.2; url=..\Home.php"); // auto takes them to the home oage
}