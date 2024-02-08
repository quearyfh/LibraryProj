<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>    
    <title>Library</title>
    <?php session_start(); require('..\Connection.php');?>
</head>

<body class ="text-bg-light">
<div class="well bg-dark text-white text-center" >ADMIN ACCESS</div>
    <div class = "row row-eq-height">
        <div class="col-lg-1 text-center">
                <h2>This is A</h2>
        </div>
        <div class="col-lg-3 text-left text-success">
                <h1>Library</h1>
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
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\"><b>" . $row["fname"] . " " . $row["lname"] . "</b></a></li>";
                        if($_SESSION["status"] == 'admin'){
                           echo "<li class=\"nav-item dropdown\">
                           <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\">Admin Pages</a>
                           <ul class=\"dropdown-menu\">
                               <li><a class=\"dropdown-item\" href=\"..\Books\AdminBook.php\">Book Access</a></li>
                               <li><a class=\"dropdown-item\" href=\"AdminUsers.php\">User Access</a></li>
                           </ul>
                           </li> " ;
                        }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="..\Login.php">Log Out</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="well bg-dark " > .   </div>
    <div class="vr"></div>
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="..\Home.php">Home</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="..\Catalog.php">Catalog</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="..\Checkout.php">Check Out</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="..\ReturnBook.php">Return Books</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>

    <div class="vr"></div> 
    <div class= "container-fluid content-row">

        <div class = "row row-eq-height">
        <div class="col-lg-4 vh-100">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center">Options</h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item text-center "> <a class="nav-link" href="AdminUsers.php">View Users</a> </li>
                    <li class="list-group-item text-center "> <a class="nav-link" href="AddUser.php">Add Users</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-8 vh-100">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center">Results Found</h5>
                </div>  
                    <div class="card-body text-center">  
                    <?php
                            $ucard = $_GET['ucard'];
                            $sql = "select * from member where ucard = $ucard";
                            echo "
                        <form name =\"UpdateUser\" method= \"post\" action= \"UpdateUser.php?ucard=$ucard\">
                            <h3> Change the field you would like to update</h3>";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                            }
                            echo "
                            <p>First Name:<br>
                            <input type=\"text\" name=\"fname\" value='" . $row['fname'] ."'>
                            </p>

                            <p>Last Name:<br>
                            <input type=\"text\" name=\"lname\" value='" . $row['lname'] ."'>
                            </p>

                            <p>Email:<br>
                            <input type=\"text\" name=\"email\" value='" . $row['email'] ."'>
                            </p>

                            <p>Ucard Number:<br>
                            <input type=\"number\" name=\"ucard\" value='" . $row['Ucard'] ."'>
                            </p>

                            <p>Phone:<br>
                            <input type=\"number\" name=\"phone\" value='" . $row['Phone'] ."'>
                            </p>

                            <p>Address:<br>
                            <input type=\"text\" name=\"address\" value='" . $row['address'] ."'>
                            </p>

                            <p>Status:<br>
                            <input type=\"text\" name=\"status\" value='" . $row['status'] ."'>
                            </p>
                            ";
                            ?>

                            <button type="submit" class="btn btn-md btn-success rounded-0 border border-dark">Change User</button>
                            <br>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>


    


</body>