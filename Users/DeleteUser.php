<?php
session_start(); // get my variable
include("..\Connection.php");
require('..\ValidAdmin.php'); // makes sure user is an admin
$ucard = $_GET['ucard']; // gets the ucard from the url

$sql = "delete from member where ucard = '$ucard';"; // will delete the member that matches the ucard
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The user has been removed!\"); </script>"; // alerts the user the member has been removed
    header("refresh:0.2; url=AdminUsers.php");
} else {
    echo "<script type=\"text/javascript\"> alert(\"The user has been NOT removed!\"); </script>";
    header("refresh:0.2; url=AdminUsers.php");
}