<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library</title>
    <?php session_start();
    require('Connection.php'); ?>
</head>

<body class="text-bg-light">
    <div class="well bg-dark text-white text-center">Open from 8am - 5pm at 12345 Example St. IN</div>
    <div class="row row-eq-height">
        <div class="col-lg-1 text-center">
            <h2>This is A</h2>
        </div>
        <div class="col-lg-3 text-left text-success">
            <h1>Library</h1>
        </div>
        <div class="col-lg-3 ms-auto text-end">
        </div>
    </div>
    <div class="well bg-dark "> . </div>
    <div class="vr"></div>
    <div class="vr"></div>
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center">Login</h5>
                    </div>
                    <div class="card-body text-center">
                        <form name="SubmitUser" method="post" action=".\Users\CheckUser.php">
                            <p>Ucard Number:<br>
                                <input type="text" name="ucard" pattern="[0-9]{7}" required>
                            </p>


                            <p>Last Four Digits of Phone Number:<br>
                                <input type="text" name="phone" pattern="[0-9]{4}" required>
                            </p>

                            <button type="submit"
                                class="btn btn-md btn-success rounded-0 border border-dark">Login</button>
                            <br>
                            <p>Don't have an account?<a class="nav-link" href="SignUp.php">Click Here to Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
</body>