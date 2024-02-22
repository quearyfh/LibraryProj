<?php
session_start();
include("..\Connection.php");
$ucard = $_POST["ucard"];
$phone = $_POST["phone"];

$sql = "select * from member where ucard='$ucard' and RIGHT(phone,4) = '$phone'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["ucard"] = $ucard;
    if ($row["status"] != 'User') {
        $_SESSION["status"] = 'admin';
    } else {
        $_SESSION["status"] = 'User';
    }
    $_SESSION["ucard"] = $ucard;
    header("refresh:0.2; url=..\mail.php");
} else {
    echo "<script type=\"text/javascript\"> alert(\"Your Login Information is incorrect!\"); </script>";
    header("refresh:0.2; url=..\Login.php");
}