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
    require('..\Connection.php');
    require('..\ValidUser.php'); ?>
</head>

<body class="text-bg-light">
    <div class="well bg-dark text-white text-center">Open from 8am - 5pm at 12345 Example St. IN</div>
    <div class="row row-eq-height">
        <div class="col-lg-1 fw-bold text-center">
            <h3>This<br> is A</h3>
        </div>
        <div class="col-lg-3 text-right text-success fw-bolder fst-italic ">
            <p class="fs-1">Library</p>
        </div>
        <div class="col-lg-4 ms-auto text-end">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <?php
                            $ucard = $_SESSION["ucard"];
                            $sql = "select * from member where ucard = '$ucard'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"Profile.php\"><b>" . $row["fname"] . " " . $row["lname"] . "</b></a></li>";
                            if ($_SESSION["status"] == 'admin') {
                                echo "<li class=\"nav-item dropdown\">
                           <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\">Admin Pages</a>
                           <ul class=\"dropdown-menu\">
                               <li><a class=\"dropdown-item\" href=\"..\Books\AdminBook.php\">Book Access</a></li>
                               <li><a class=\"dropdown-item\" href=\"AdminUsers.php\">User Access</a></li>
                           </ul>
                           </li> ";
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="..\Logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success"><a class="nav-link"
                    href="..\Home.php">Home</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\Catalog.php">Catalog</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\Checkout.php">Check Out</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\ReturnBook.php">Return Books</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <!-- ^^ above code is explained on the Home.php file, it is the same for every page -->
    <div class="vr"></div>
    <div class="container-fluid content-row">
    <div class="row row-eq-height">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center text-white">Your Current Information</h5>
                </div>
                <div class="card-body text-center">
                    <?php
                                $sql = "select * from member where ucard = $ucard";
                                echo "
                            <form name =\"UpdateUser\" method= \"post\" action= \"UpdateProfile.php?ucard=$ucard\">
                                <h5> Change the field you would like to update</h5><br>";

                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                }
                                $ucard=$row['Ucard'];
                                echo "
                                <p><b>First Name:</b><br>
                                <input type=\"text\" name=\"fname\"  minlength=\"2\" value='" . $row['fname'] . "'required onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                                </p>

                                <p><b>Last Name:</b><br>
                                <input type=\"text\" name=\"lname\"  minlength=\"2\" value='" . $row['lname'] . "'required  onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                                </p>

                                <p><b>Email:</b><br>
                                <input type=\"text\" name=\"email\"  minlength=\"2\" value='" . $row['email'] . "'required >
                                </p>

                                <p><b>Ucard Number:</b><br>
                                <input type=\"number\" name=\"ucard\" value='" . $row['Ucard'] . "'required disabled>
                                </p>

                                <p><b>Phone:</b><br>
                                <input type=\"text\" name=\"phone\" pattern=\"[1-0]{1}[0-9]{9}\" value='" . $row['Phone'] . "'required>
                                </p>

                                <p><b>Address:</b><br>
                                <input type=\"text\" name=\"address\"  minlength=\"2\" value='" . $row['address'] . "'required>
                                </p>

                                <p><b>Status:</b><br>
                                <input type=\"text\" name=\"status\" minlength=\"2\" value='" . $row['status'] . "'disabled>
                                </p>
                                ";
                                ?>

                        <button type="submit" class="btn btn-md btn-success">Change
                        Profile</button> <br><br>
                        <h4>No longer want to be a member? </h4>
                        <?php
                        echo "<button type=\"button\" class=\"btn btn-md btn-success \"><a class=\"nav-link\" href=\"DeleteProfile.php?ucard=$ucard\">Delete Account</a></button>";
                        ?>
                    <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>





</body>