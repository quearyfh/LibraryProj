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
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\".\Users\Profile.php\"><b>" . $row["fname"] . " " . $row["lname"] . "</b></a></li>";
                            if ($_SESSION["status"] == 'admin') {
                                echo "<li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\">Admin Pages</a>
                                <ul class=\"dropdown-menu\">
                                    <li><a class=\"dropdown-item\" href=\".\Books\AdminBook.php\">Book Access</a></li>
                                    <li><a class=\"dropdown-item\" href=\".\Users\AdminUsers.php\">User Access</a></li>
                                </ul>
                                </li> ";
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="Login.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="well bg-dark "> . </div>
    <div class="vr"></div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="Home.php">Home</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="Catalog.php">Catalog</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="Checkout.php">Check Out</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0 border border-dark"><a class="nav-link" href="ReturnBook.php">Return Books</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="vr"></div>


    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Books to Return</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $ucard = $_SESSION["ucard"];
                        $sql = "select * from book where ISBN IN(select ISBN from checkout where ucard=$ucard);";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ISBN=$row["ISBN"];
                                echo "<div class=\"card mb-3\" style=\"max-width: 540px;\">";
                                echo "<div class=\"row g-0\">";
                                echo "<div class=\"col-md-4\">
                                <img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">
                                </div>
                                <div class=\"col-md-8\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">" . $row["title"] . "</h5>
                                    <p class=\"card-text\"><b>Author: </b>" . $row["author"] . "</p>
                                    <p class=\"card-text\"><b>ISBN: </b>" . $row["ISBN"] . "</p>
                                    <p class=\"card-text\"><b>Genre: </b>" . $row["genre"] . "</p>";
                            }
                            $sql = "select * from checkout where ISBN=$ISBN";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                        <p class=\"card-text\"><b>Date Checked Out: </b>" . $row["DateCheck"] . "</p>
                                        <p class=\"card-text\"><b>Date to Return : </b>" . $row["DateReturn"] . "</p>
                                        <button type=\"button\" class=\"btn btn-sm btn-success text-center\"> <a class=\"nav-link\" href=\"ActualReturn.php?ISBN=$ISBN
                                        \">Return </a></button>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    ";
                                }
                            }
                        }else{
                            echo "<p class=\"card-text text-center\"> You currently have no books to return.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

</body>