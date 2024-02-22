<?php 
    // Authorization
    // Check whether the user is an admin
    if($_SESSION['status'] !='admin'){
        header("Location:../Home.php");
    }
