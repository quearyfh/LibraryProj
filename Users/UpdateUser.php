<?php
// will update the users information in the database
session_start();
include("..\Connection.php"); // connects to database
require('..\ValidAdmin.php'); // makes sure they are an admin
$OGucard = $_GET['ucard']; // gets UCARD from the URL
$fname = $_POST["fname"]; // all from the form I had
$lname = $_POST["lname"];
$email = $_POST["email"];
$ucard = $_POST["ucard"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$status = $_POST["status"];

$sql = "update member set fname='$fname',lname='$lname',email='$email',Ucard=Ucard, Phone='$phone', address='$address', status= status where ucard='$OGucard';"; 
//^^ updates user with new information
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"The User has been changed!\"); </script>"; // alerts admin they have changed the user
header("refresh:0.2; url=AdminUsers.php"); // sends them back to admin

