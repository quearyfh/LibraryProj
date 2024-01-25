
<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "LibProj"; // a server I have 
    
    $conn = mysqli_connect($servername, $username, $password,$database);
    
    if(!$conn){
        die("Connection failed" .mysqli_connect_error());
    }
    else{
        //echo "Connected successfully";
    }
    //mysqli_close($conn);
?>