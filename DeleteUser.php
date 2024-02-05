<?php
    session_start(); 
    include("Connection.php");
    $ucard = $_GET['ucard'];

    $sql="delete from member where ucard = '$ucard' and status !='Owner'";
    if (mysqli_query($conn, $sql)){
        echo "<script type=\"text/javascript\"> alert(\"The User was removed!\"); </script>";
        header("refresh:0.2; url=AdminUser.php");
    }
    else{
        echo "<script type=\"text/javascript\"> alert(\"The User was not removed!\"); </script>";
        header("refresh:1; url=AdminUser.php");
    }
    
?>