<?php
include("..\Connection.php");
$OGucard = $_GET['ucard'];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$ucard = $_POST["ucard"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$status = $_POST["status"];

$sql = "update member set fname='$fname',lname='$lname',email='$email',Ucard='$ucard', Phone='$phone', address='$address', status='$status' where ucard='$OGucard';";
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"The User has been changed!\"); </script>";
header("refresh:0; url=AdminUsers.php");

