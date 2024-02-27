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
    require('..\Connection.php'); // connects to database
    require('..\ValidUser.php'); // makes sure they are logged in
    require('..\ValidAdmin.php'); // makes sure they are an admin
    include("..\AdminHeader.php"); // header for admin?>
</head>

<body class="text-bg-light"><!-- makes background grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100"><!--column on the side-->
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title text-center">Options</h5><!-- lists user options for admin-->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminUsers.php">View
                                Users</a> </li><!--clickable links to pick option-->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddUser.php">Add
                                Users</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100"><!-- the main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Results Found</h5><!-- shows all the user's info on one card-->
                    </div>
                    <div class="card-body text-center"><!-- centers text-->
                        <?php
                            $ucard = $_GET['ucard']; // gets the ucard from the URL
                            $sql = "select * from member where ucard = $ucard";
                            echo "
                        <form name =\"UpdateUser\" method= \"post\" action= \"UpdateUser.php?ucard=$ucard\"> 
                            <h5> Change the field you would like to update</h5><br>"; // a form that auto updates the user
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                            }
                            echo "
                            <p><b>First Name:</b><br>
                            <input type=\"text\" name=\"fname\" minlength=\"2\" value='" . $row['fname'] . "'required required onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                            </p>

                            <p><b>Last Name:</b><br>
                            <input type=\"text\" name=\"lname\" minlength=\"2\" value='" . $row['lname'] . "'required onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                            </p>

                            <p><b>Email:</b><br>
                            <input type=\"text\" name=\"email\" minlength=\"2\" value='" . $row['email'] . "'required>
                            </p>

                            <p><b>Ucard Number:</b><br>
                            <input type=\"text\" name=\"ucard\" pattern=\"[0-9]{7}\" value='" . $row['Ucard'] . "' required>
                            </p>

                            <p><b>Phone:</b><br>
                            <input type=\"text\" name=\"phone\" pattern=\"[1-0]{1}[0-9]{9}\" value='" . $row['Phone'] . "' required>
                            </p>

                            <p><b>Address:</b><br>
                            <input type=\"text\" name=\"address\"  minlength=\"2\" value='" . $row['address'] . "'required>
                            </p>

                            <p><b>Status:</b><br>
                            <input type=\"text\" name=\"status\" value='" . $row['status'] . "'required>
                            </p>
                            ";
                            // the above echo shows all the user's current information within a form with data validation on the inputs
                            ?>

                        <button type="submit" class="btn btn-md btn-success">Change
                            User</button> <!--will update user when submitted-->
                        <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>