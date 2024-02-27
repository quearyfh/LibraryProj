<?php
// this file is how I send emails to the user
include("Connection.php");
session_start();
$ucard = $_SESSION["ucard"]; // getting the ucard from the session variables

$sql = "select * from member where ucard='$ucard'; "; // selects everything about the current member
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$row['email']; // taking their email from the sql query

$d=strtotime("+3 days");//getting 3 days from today
$duedate = date("Y-m-d", $d); // converting date to proper form for database


$sql = "select * from checkout where Ucard='$ucard' and DateReturn='$duedate';"; //finding books due in 3 days
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { // if there are books due 
  while ($row = mysqli_fetch_assoc($result)) {
    $ISBN= $row['ISBN'];
      echo "<script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/emailjs-com@2.4.0/dist/email.min.js\">
              </script>
              <script type=\"text/javascript\">
                (function() {
                  emailjs.init('e9ffixOE5GbV8xB6_'); //please encrypted user id for malicious attacks
                })();
              //set the parameter as per you template parameter[https://dashboard.emailjs.com/templates]
                var templateParams = {
                  to_name: '$email',
                  message: \"You must return the book: $ISBN within the next 3 days! Or else you will be fined!!\"
                };

                emailjs.send('LibrarySystem', 'template_qw9xs4l', templateParams)
                  .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                  }, function(error) {
                    console.log('FAILED...', error);
                  });
              </script>";  
        // This echo uses Email JS where I created a template that tells the user they have to return their books
      }
}
header("refresh:0.2; url=Home.php"); // I run this in the login so it redirects them to the home page when done
