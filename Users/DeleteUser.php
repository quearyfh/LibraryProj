<?php
session_start();
include("..\Connection.php");
require('..\ValidAdmin.php');
$ucard = $_GET['ucard'];

$sql = "delete from member where ucard = '$ucard';";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"The user has been removed!\"); </script>";
    header("refresh:0.2; url=AdminUsers.php");
} else {
    echo "<script type=\"text/javascript\"> alert(\"The user has been NOT removed!\"); </script>";
    header("refresh:0.2; url=AdminUsers.php");
}