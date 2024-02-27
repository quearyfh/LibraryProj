<!DOCTYPE html>
<html lang="en">
<!-- This file is the library catalog-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library Catalog</title>
    <?php session_start(); // how I get session variables 
    require('Connection.php'); // connects to database
    require('ValidUser.php'); // checks user is logged in
    include('Header.php');// includes header ?>
</head>

<body class="text-bg-light"><!-- makes background light gray-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height"><!-- makes rows all the same height-->
            <div class="col-lg-4 vh-100"><!-- makes my column slightly smaller than half on the left side-->
                <div class="card">
                    <div class="card-header bg-success"><!-- card label-->
                        <h5 class="card-title text-center text-white"> <a class="nav-link" href="Catalog.php">Genres</a>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <!-- each is a clickable link that will make the books in that genre pop up-->
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

            <div class="col-lg-6 vh-100"><!--the main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Results Found</h5><!-- shows the books they searched for-->
                    </div>
                    <div class="card-body">
                        <?php
                        if (!empty($_GET)) { // if the URL contains a genre in it
                            $Genre = $_GET['Genre'];
                            $sql = "select * from book where genre='$Genre'"; // selects only  the books within genre selected
                        } else {
                            $sql = "select * from book"; // selects all books
                        }
                        $result = mysqli_query($conn, $sql); // if a query results a result
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
                            // The above echo is showing the main infor for the book in the card body
                            if($row["copies"] !=0){ // if the copies is not zero
                            echo "<button type=\"button\" class=\"btn btn-sm btn-success text-center\"> <a class=\"nav-link\" href=\"AddtoCart.php?ISBN=$ISBN
                            \">Add to Check Out</a></button>"; // if not zero, then they have a check out button
                            }else{
                                echo "<button type=\"button\" class=\"btn btn-sm btn-success text-center disables\">Currently Out of Stock </button>";
                                // if the copies is zero then the button is disabled and labeled out of stock
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