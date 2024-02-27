<?php
session_start(); // get my session variables
include("..\Connection.php"); // connects to database
$ucard = $_POST["ucard"]; // varibales from my form
$phone = $_POST["phone"];

$sql = "select * from member where ucard='$ucard' and RIGHT(phone,4) = '$phone'"; // selects the user if their ucard and phone last 4 digits match
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) { // if the sql finds a match
    $row = mysqli_fetch_assoc($result);
    $_SESSION["ucard"] = $ucard;
    if ($row["status"] != 'User') {
        $_SESSION["status"] = 'admin'; // assigns admin priviledges
    } else {
        $_SESSION["status"] = 'User'; // makes them a user status
    }
    $_SESSION["ucard"] = $ucard;
    header("refresh:0.2; url=..\mail.php"); // checks for overdue books
} else {  // if no match is found
    echo "<script type=\"text/javascript\"> alert(\"Your Login Information is incorrect!\"); </script>"; // alerts the user they are wrong
    header("refresh:0.2; url=..\Login.php"); // takes them to the login screen again
}