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
    require('..\Connection.php'); // connect to database
    require('..\ValidUser.php');// logged in
    require('..\ValidAdmin.php');// ensures admin
    include("..\AdminHeader.php"); // includes header?>
</head>

<body class="text-bg-light"><!--makes backgroyund grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100"><!-- side column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Options</h5>
                        <!-- card contains admin user options -->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminUsers.php">View
                                Users</a> </li><!--clickable links that admin have access to-->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddUser.php">Add
                                User</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100"><!-- the main column-->
                <div class="card ">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white ">Current Users</h5><!-- card displaued current users-->
                    </div>
                    <div class="card-body">
                        <?php
                            $sql = "select * from member"; // will select all members from database
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { // while there are memebers in database
                                    $ucard = $row["Ucard"];
                                    echo "<div class=\"card mb-3 mx-auto\" style=\"max-width: 540px;\">";
                                    echo "<div class=\"row g-0\">";
                                    echo "
                                                <div class=\"card-body\">
                                                    <h4 class=\"card-title\">" . $row["fname"] . " " . $row["lname"] . "</h4>
                                                    <p class=\"card-text\"><b>Ucard Number: </b>" . $row["Ucard"] . "</p>
                                                    <p class=\"card-text\"><b>Email: </b>" . $row["email"] . "</p>
                                                    <p class=\"card-text\"><b>Phone Number: </b>" . $row["Phone"] . "</p>
                                                    <p class=\"card-text\"><b>Address: </b>" . $row["address"] . "</p>
                                                    <p class=\"card-text\"><b>Admin Status: </b>" . $row["status"] . "</p>
                                                    <button type=\"button\" class=\"btn btn-sm btn-success\"><a class=\"nav-link\" href=\"EditUser.php?ucard=$ucard\">Edit</a></button>
                                                    <button type=\"button\" class=\"btn btn-sm btn-success\"><a class=\"nav-link\" href=\"DeleteUser.php?ucard=$ucard\">Remove</a></button>
                                                    </div> 
                                                </div>
                                                </div>
                                            ";
                                            // this echo will display user information within the card body
                                            // there are also two butons which allow the admin to delete or edit the user
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>





</body>