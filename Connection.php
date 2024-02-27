<?php
// connects my database to my php files
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "LibProj"; // a server I have 

$conn = mysqli_connect($servername, $username, $password, $database); // logining me into the server

if (!$conn) { // if not conneted will show failure
    die("Connection failed" . mysqli_connect_error());
} else {
    //echo "Connected successfully";
}
//mysqli_close($conn);
?>