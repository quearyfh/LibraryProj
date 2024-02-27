
<?php 
// php file checking if a user has signed in- stops them from going to other urls when not signed in 
    // Check whether the user is logged in or not with status
    if(!isset($_SESSION['status'])){
        // Sends the alert that you must login first
        echo "<script type=\"text/javascript\"> alert(\"You MUST Login first!\"); </script>";
        // Redirect to Login Page
        header("Location:Login.php");
    }
