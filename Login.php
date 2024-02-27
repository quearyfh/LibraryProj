<!DOCTYPE html>
<html lang="en">
<!--This file is my login page for my System-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library Login</title><!-- title of my window-->
    <?php session_start();
    require('Connection.php'); // connects them to the database?>
</head>

<body class="text-bg-light">
    <div class="well bg-dark text-white text-center">Open from 8am - 5pm at 12345 Example St. IN</div> <!-- banner at the top of my browser-->
    <div class="row row-eq-height">
        <div class="col-lg-1 fw-bold text-center"><!--makes text big and bold-->
            <h3>This<br> is A</h3>
        </div>
        <div class="col-lg-3 text-right text-success fw-bolder fst-italic "> <!--makes Library bigger and in italics-->
            <p class="fs-1">Library</p>
        </div>
    </div>
    <hr> <!--cute line to seperate the header-->
    <div class="vr"></div>
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-3"> <!--just a spacer column-->
            </div>
            <div class="col-lg-6"><!--main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Login</h5> <!--a card that contains the form to login-->
                    </div>
                    <div class="card-body text-center"><!-- main card information contains the form-->
                        <form name="SubmitUser" method="post" action=".\Users\CheckUser.php"> <!--sends them to checkUser on submit-->
                            <p><b>Ucard Number:</b><br>
                                <input type="text" name="ucard" pattern="[0-9]{7}" required>
                                <!--requires the user to enter 7 digits-->
                            </p>


                            <p><b>Last Four Digits of Phone Number:</b><br>
                                <input type="text" name="phone" pattern="[0-9]{4}" required>
                                <!--requires the last 4 digits on their phone number-->
                            </p>

                            <button type="submit"
                                class="btn btn-md btn-success">Login</button>
                            <br>
                            <p><b>Don't have an account?</b><a class="nav-link" href="SignUp.php">Click Here to Sign Up</a></p>
                            <!--Will send the user to the sign up page when clicked-->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"><!--Spacer column-->
            </div>
        </div>
</body>