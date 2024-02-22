<?php
session_start();
include("..\Connection.php");
require('..\ValidUser.php');
$ucard = $_GET['ucard'];

$sql = "delete from member where ucard = '$ucard';";
if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\"> alert(\"You have been deleted!\"); </script>";
    header("refresh:0.2; url=..\Login.php");
}