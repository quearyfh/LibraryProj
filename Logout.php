<?php
// this file logs users out of their account
session_start(); // must start the session so it knows which session to destroy
session_destroy(); // destroys the current sessions informations so they can't just redirect to a different URL if they log out
header("refresh:0.2; url=Login.php"); // sends them back to the login page

