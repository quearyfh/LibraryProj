<!--html page for admin to add users -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library ADMIN</title>
    <?php session_start();
    require('..\Connection.php');
    require('..\ValidUser.php');
    require('..\ValidAdmin.php'); 
    include("..\AdminHeader.php");?>
</head>

<body class="text-bg-light"><!-- makes background grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100"><!-- side card containing options-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Options</h5>
                        <!-- card that contain admin user options-->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminUsers.php">View
                                Users</a> </li>
                        <!-- links to other admin activities -->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddUser.php">Add
                                User</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100"><!-- the main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Add User's information</h5>
                        <!-- card that contains form for user-->
                    </div>
                    <div class="card-body text-center">
                        <form name="CreateMember" method="post" action="CreateMember.php">
                            <!-- form submits to createuser.php-->
                            <p><b>First name:</b><br>
                                <input type="text" name="fname" required onkeydown="return /[a-zA-Z]/i.test(event.key)">
                            </p>

                            <p><b>Last name:</b><br>
                                <input type="text" name="lname" required required
                                    onkeydown="return /[a-zA-Z]/i.test(event.key)">
                                <!--  only allows user to enter letters-->
                            </p>

                            <p><b>Email:</b><br>
                                <input type="text" name="email" required>
                            </p>

                            <p><b>Phone Number:</b><br>
                                <input type="text" name="phone" pattern="[1-9]{1}[0-9]{9}" required>
                                <!-- the pattern ensures users enter a digit 1-9 first and then the rest of the phone digits -->
                            </p>

                            <p><b>Address:</b><br>
                                <input type="text" name="address" required>
                                <!--required- ensures users do not leave space as null -->
                            </p>
                            <p><b>Status:</b><br>
                                <input type="text" name="status" required onkeydown="return /[a-zA-Z]/i.test(event.key)">
                                <!--required- ensures users do not leave space as null -->
                            </p>

                            <button type="submit" class="btn btn-md btn-success">Add
                                User</button> <!--  when clicked the CreateMember.php file will run-->
                            <br>
                    </div>
                </div>
            </div>
        </div>





</body>