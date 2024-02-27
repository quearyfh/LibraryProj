<!-- the file for the sign up page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap code^^ -->
    <title>Library SignUp</title>
    <?php session_start(); // starts sessions so I can track members
    require('Connection.php'); // connection to my database
?>
</head>

<body class="text-bg-light">
    <div class="well bg-dark text-white text-center">Open from 8am - 5pm at 12345 Example St. IN</div> <!--little message at top of page-->
    <div class="row row-eq-height">
        <div class="col-lg-1 fw-bold text-center"> <!-- makes text bigger and bold-->
            <h3>This<br> is A</h3>
        </div>
        <div class="col-lg-3 text-right text-success fw-bolder fst-italic "> <!-- makes my library bigger and in italics-->
            <p class="fs-1">Library</p>
        </div>
        <div class="col-lg-3 ms-auto text-end"> <!-- just spacer columns so they will look better-->
        </div>
    </div>
    <hr>
    <div class="vr"></div> <!--little line to divide header from main code-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-3"> <!-- spacer column-->
            </div>
            <div class="col-lg-6"><!--main column-->
                <div class="card">
                    <div class="card-header bg-success"><!-- a card that contains the signup form-->
                        <h5 class="card-title text-center text-white">Sign Up</h5>
                    </div>
                    <div class="card-body text-center"> <!--puts form text in the center-->
                        <form name="CreateUser" method="post" action=".\Users\createUser.php"><!-- sends to create user php when submitted-->
                            <p><b>First name:</b><br>
                                <input type="text" name="fname" required minlength="2" onkeydown="return /[a-zA-Z]/i.test(event.key)">
                                <!--the onkeydown is so they can't enter numbers-->
                            </p>
                            <p><b>Last name:</b><br> <!--Bold text and each one a new section-->
                                <input type="text" name="lname" required minlength="2" onkeydown="return /[a-zA-Z]/i.test(event.key)">
                            </p>

                            <p><b>Email:</b><br>
                                <input type="text" name="email" required minlength="8" onkeydown="return /[a-zA-Z0-9@]/i.test(event.key)">
                            </p>

                            <p><b>Phone Number:</b><br>
                                <input type="text" name="phone" pattern="[1-0]{1}[0-9]{9}" required>
                                <!--pattern so they have to enter a valid number-->
                            </p>

                            <p><b>Address:</b><br>
                                <input type="text" name="address" minlength="2" required onkeydown="return /[a-zA-Z0-9]/i.test(event.key)">
                            </p>

                            <button type="submit" class="btn btn-md btn-success rounded-0 border border-dark">Sign
                                Up</button>
                            <br>
                            <p><b>Already have an account?</b><a class="nav-link" href="Login.php">Click Here to Login</a></p>
                            <!-- ^^ will send them to the login page if they click the link -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"><!--spacer column-->
            </div>
        </div>
</body>