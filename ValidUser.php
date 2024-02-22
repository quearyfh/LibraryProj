<?php 
    // Authorization
    // Check whether the user is logged in or not
    if(!isset($_SESSION['user'])){
        // User is not logged in
        // Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error'>Please login </div>";
        // Redirect to Login Page
        header("refresh:0.2; url=Login.php");
    }
