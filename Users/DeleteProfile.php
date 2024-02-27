<?php
session_start(); // get variables
include("..\Connection.php");
require('..\ValidUser.php'); // makes sure user is logged in
$ucard = $_GET['ucard'];

$sql = "delete from member where ucard = '$ucard';"; // removes the current user
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"You have been deleted!\"); </script>"; // alerts the user they are now deleted
    header("refresh:0.2; url=..\SignUp.php"); // relocates them to the Sign UP page
}