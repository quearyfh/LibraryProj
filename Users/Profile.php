<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library Profile</title>
    <?php session_start();
    require('..\Connection.php'); // connect to database
    require('..\ValidUser.php'); // checks logged in
    include("..\ProfileHeader.php"); // the same header but directories needed to be different?>
</head>

<body class="text-bg-light"> <!--makes background light grey-->
    <div class="container-fluid content-row">
    <div class="row row-eq-height">
        <div class="col-lg-2"><!--spacer column-->
        </div>
        <div class="col-lg-8"><!--main column-->
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center text-white">Your Current Information</h5><!-- A card that displays their current info-->
                </div>
                <div class="card-body text-center"><!-- centers text in middle-->
                    <?php
                                $sql = "select * from member where ucard = $ucard"; // selects the current users info
                                echo "
                            <form name =\"UpdateUser\" method= \"post\" action= \"UpdateProfile.php?ucard=$ucard\">
                                <h5> Change the field you would like to update</h5><br>"; // when they submit, it will auto update them

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
                                // this echo is the form with their current values enter.
                                //There is data validation so they can only enter certain numbers
                                ?>

                        <button type="submit" class="btn btn-md btn-success">Change
                        Profile</button> <br><br> <!--the submit button-->
                        <h4>No longer want to be a member? </h4>
                        <?php
                        echo "<button type=\"button\" class=\"btn btn-md btn-success \"><a class=\"nav-link\" href=\"DeleteProfile.php?ucard=$ucard\">Delete Account</a></button>";
                        // ^^ a button if they wanted to delete their account
                        ?>
                    <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>





</body>