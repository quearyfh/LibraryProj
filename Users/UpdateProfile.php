<?php
//allows users to update their profile
session_start();
include("..\Connection.php");
require('..\ValidUser.php');
$OGucard = $_GET['ucard']; // get from the URL
$fname = $_POST["fname"]; // get from my form
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$sql = "update member set fname='$fname',lname='$lname',email='$email', Phone='$phone', address='$address' where ucard='$OGucard';";
//^^ updates the member with their new information
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"Your Profile has been changed!\"); </script>"; // alerts the user the profile is updated
header("refresh:0.2; url=Profile.php"); // sends them to their new profile

