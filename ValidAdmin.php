<?php 
    // Authorization
    // Check whether the user is an admin so users cannot access admin page through url
    if($_SESSION['status'] !='admin'){
        header("Location:../Home.php"); // redirect them to home if they are not an admin
    }
