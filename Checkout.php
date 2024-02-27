<!DOCTYPE html>
<html lang="en">
<!--This is the file for my Checkout Page-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Library CheckOut</title>
    <?php session_start(); // starts the session so I can use my variables
    require('Connection.php');
    require('ValidUser.php'); // checks user is logged in
    include("Header.php"); // includes my header?>
</head>

<body class="text-bg-light">
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-2"><!--spacer column-->
            </div>
            <div class="col-lg-8"><!--the main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Currently Checking Out</h5><!-- card showing books user added to cart-->
                    </div>
                    <div class="card-body"><!-- contains main information on card-->
                        <?php
                        $ucard = $_SESSION["ucard"];// getting ucard variable from session
                        $sql = "select * from book where ISBN IN (select ISBN from cart where ucard=$ucard);"; // selects books that the user has added to cart
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { // while there are books in the cart
                                $ISBN=$row["ISBN"];
                                echo "<div class=\"card mx-auto \" style=\"max-width: 650px;\">"; // sets the width of the card and centers it
                                    echo "<div class=\"row g-0\">";
                                        echo "<div class=\"col-md-4\">
                                                <img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">
                                               </div>
                                                <div class=\"col-md-8\">
                                                    <div class=\"card-body\">
                                                        <h4 class=\"card-title\">" . $row["title"] . "</h4>
                                                        <p class=\"card-text\"><b>Author: </b>" . $row["author"] . "</p>
                                                        <p class=\"card-text\"><b>ISBN: </b>" . $ISBN . "</p>
                                                        <p class=\"card-text\"><b>Genre: </b>" . $row["genre"] . "</p>
                                                        <p class=\"card-text\"><b>Check Out For: </b>
                                                        <form method=\"POST\" action=\"CheckedOut.php?ISBN=$ISBN\">
                                                            <div class=\"form-check\">
                                                                <input class=\"form-check-input\" type=\"radio\" name=\"returndate\" value=\"1\" checked>
                                                                <label class=\"form-check-label\" for=\"flexRadioDefault1\">
                                                                    1 week
                                                                </label>
                                                            </div>
                                    
                                                            <div class=\"form-check\">
                                                                <input class=\"form-check-input\" type=\"radio\" name=\"returndate\" value=\"4\" >
                                                                <label class=\"form-check-label\" for=\"flexRadioDefault2\">
                                                                    4 weeks
                                                                </label>
                                                            </div>
                                                    
                                                            <button type=\"submit\" class=\"btn btn-md btn-success text-center\">Confirm Checkout</button>
                                                            <button type=\"button\" class=\"btn btn-md btn-success text-center\"><a class=\"nav-link\" href=\"RemoveCart.php?ISBN=$ISBN\"> Remove From Cart</a></button>
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                <br>
                                ";
                                // this echo is where the information about the book is displayed
                                // there is also a form where the user decides whether to check out the book for 1 week or 4 weeks
                            }
                        }else{
                            echo "<p class=\"card-text text-center\"> You currently have no books in your check out.</p>";// is stated if the user has no books in their cart
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>