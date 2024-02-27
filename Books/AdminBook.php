<!-- html page for Admins to view book options -->
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
    require('..\Connection.php'); // connects to database
    require('..\ValidUser.php'); // ensures logged in
    require('..\ValidAdmin.php'); // ensures admin
    include("..\AdminHeader.php");  // admin header?>
</head>

<body class="text-bg-light"><!-- makes backgroun grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100"><!-- side column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Options</h5> <!-- card containing book options -->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminBook.php">View
                                Books</a> </li>
                        <!-- clickable link to other book options-->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddBook.php">Add
                                Book</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100"><!-- main column-->
                <div class="card ">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Results Found</h5>
                        <!-- card that encompassers book results-->
                    </div>
                    <div class="card-body">
                        <?php
                            $sql = "select * from book"; // will select all the books from my table 
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) { // if there are books 
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $ISBN = $row["ISBN"];
                                    echo "<div class=\"card mb-3 mx-auto\" style=\"max-width: 650px;\">";
                                    echo "<div class=\"row g-0\">";
                                    echo "<div class=\"col-md-4\">
                                                <img src=\".\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\"> 
                                                </div>
                                                <div class=\"col-md-8\">
                                                <div class=\"card-body\">
                                                    <h4 class=\"card-title\">" . $row["title"] . "</h4>
                                                    <p class=\"card-text\"><b>Author: </b>" . $row["author"] . "</p>
                                                    <p class=\"card-text\"><b>ISBN: </b>" . $row["ISBN"] . "</p>
                                                    <p class=\"card-text\"><b>Copies: </b>" . $row["copies"] . "</p>
                                                    <p class=\"card-text\"><b>Genre: </b>" . $row["genre"] . "</p>
                                                    <button type=\"button\" class=\"btn btn-sm btn-success\"><a class=\"nav-link\" href=\"EditBook.php?ISBN=$ISBN\">Edit</a></button>
                                                    <button type=\"button\" class=\"btn btn-sm btn-success\"><a class=\"nav-link\" href=\"DeleteBook.php?ISBN=$ISBN\">Remove</a></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            ";
                                            // This echo contains my card body which has html written in it. The .row are the variables being printed from my table
                                            // there are two buttons that will take you to other .php files
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>