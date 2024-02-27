<!DOCTYPE html>
<!--This file is my return books page-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library Return</title> <!--appears at top of window-->
    <?php session_start();
    require('Connection.php'); // requires connection to database
    require('ValidUser.php'); // checks if valid user
    include("Header.php");// provides my header?>
</head>

<body class="text-bg-light"><!--background is light grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height"><!--makes rows same height-->
            <div class="col-lg-2"><!--spacer column-->
            </div>
            <div class="col-lg-8"><!--main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Books to Return</h5> <!--card contains all the books needing to be return-->
                    </div>
                    <div class="card-body"> <!--the information for the card goes in here-->
                        <?php
                        $ucard = $_SESSION["ucard"]; // getting my ucard number from my session
                        $sql = "select * from book where ISBN IN(select ISBN from checkout where ucard=$ucard);"; 
                        // ^^ will select everything about each book that the current user has checked out
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { // while there are books that the user checked out
                                $ISBN=$row["ISBN"]; // stealing for my later URL
                                echo "<div class=\"card mx-auto \" style=\"max-width: 650px;\"> 
                                        <div class=\"row g-0\">
                                            <div class=\"col-md-4\">
                                                <img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">
                                            </div>
                                            <div class=\"col-md-8\">
                                                <div class=\"card-body \">
                                                    <h4 class=\"card-title\">" . $row["title"] . "</h4>
                                                    <p class=\"card-text\"><b>Author: </b>" . $row["author"] . "</p>
                                                    <p class=\"card-text\"><b>ISBN: </b>" . $row["ISBN"] . "</p>
                                                    <p class=\"card-text\"><b>Genre: </b>" . $row["genre"] . "</p>";
                            // the above echo creates a card with the book information and picture
                            $sql2 = "select * from checkout where ISBN=$ISBN"; // selects checkout information about the current book 
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo "
                                                    <p class=\"card-text\"><b>Date Checked Out: </b>" . $row2["DateCheck"] . "</p>
                                                    <p class=\"card-text\"><b>Date to Return: </b>" . $row2["DateReturn"] . "</p>
                                                    <button type=\"button\" class=\"btn btn-sm btn-success text-center\"> <a class=\"nav-link\" href=\"ActualReturn.php?ISBN=$ISBN
                                                    \">Return </a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    ";
                                    //^^ the above echo displays the date checked out and the date needed to return and the return book which will return books 
                                }
                            }
                        }
                        }else{
                            echo "<p class=\"card-text text-center\"> You currently have no books to return.</p>";// will display if the user has no checked out any books

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>