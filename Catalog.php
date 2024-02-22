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
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="Home.php">Home</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="Catalog.php">Catalog</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="Checkout.php">Check Out</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="ReturnBook.php">Return Books</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <!-- ^^ above code is explained on the Home.php file, it is the same for every page -->
    <div class="vr"></div>
    <div class="container-fluid content-row">

        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white"> <a class="nav-link" href="Catalog.php">Genres</a>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Business">Business</a></li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Cooking">Cooking</a></li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Fantasy">Fantasy</a> </li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Sci-Fi">Sci-Fi</a></li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Horror">Horror</a> </li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Mystery">Mystery</a></li>
                        <li class="list-group-item text-center "> <a class="nav-link"
                                href="Catalog.php?Genre=Nature">Nature</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 vh-100">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Results Found</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (!empty($_GET)) {
                            $Genre = $_GET['Genre'];
                            $sql = "select * from book where genre='$Genre'";
                        } else {
                            $sql = "select * from book";
                        }
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ISBN=$row["ISBN"];
                                echo "<div class=\"card mb-3 mx-auto\" style=\"max-width: 540px;\">";
                                echo "<div class=\"row g-0\">";
                                echo "<div class=\"col-md-4\">
                        <img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">
                        </div>
                        <div class=\"col-md-8\">
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">" . $row["title"] . "</h4>
                            <p class=\"card-text\"><b>Author: </b>" . $row["author"] . "</p>
                            <p class=\"card-text\"><b>ISBN: </b>" . $row["ISBN"] . "</p>
                            <p class=\"card-text\"><b>Copies: </b>" . $row["copies"] . "</p>
                            <p class=\"card-text\"><b>Genre: </b>" . $row["genre"] . "</p>";
                            if($row["copies"] !=0){
                            echo "<button type=\"button\" class=\"btn btn-sm btn-success text-center\"> <a class=\"nav-link\" href=\"AddtoCart.php?ISBN=$ISBN
                            \">Add to Check Out</a></button>";
                            }else{
                                echo "<button type=\"button\" class=\"btn btn-sm btn-success text-center disables\">Currently Out of Stock </button>";
                            }
                        echo"
                        </div>
                        </div>
                        </div>
                        </div>
                        ";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>





</body>