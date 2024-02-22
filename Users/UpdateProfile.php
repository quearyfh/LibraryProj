<?php
session_start();
include("..\Connection.php");
require('..\ValidUser.php');
$OGucard = $_GET['ucard'];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$sql = "update member set fname='$fname',lname='$lname',email='$email', Phone='$phone', address='$address' where ucard='$OGucard';";
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"The User has been changed!\"); </script>";
header("refresh:0.2; url=Profile.php");

