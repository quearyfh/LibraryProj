<?php 
    // Authorization
    // Check whether the user is logged in or not
    if(!isset($_SESSION['status'])){
        // User is not logged in
        // Redirect to login page with message
        echo "<script type=\"text/javascript\"> alert(\"You MUST Login first!\"); </script>";
        // Redirect to Login Page
        header("Location:Login.php");
    }
