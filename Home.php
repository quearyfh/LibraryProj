<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--^^ need for bootstrap commands-->
    <title>Library Home</title> <!--title-->
    <?php session_start(); // starts session to track variables
    require('Connection.php');  // connects to database
    require('ValidUser.php'); // ensures they are logged in 
    include("Header.php"); // makes my header go first
    ?>
</head>

<body class="text-bg-light"> <!--makes background light gray-->
    <div class="container-fluid content-row"> <!-- makes sure my rows stay the same length-->
        <div class="row row-eq-height">
            <div class="col-lg-6 vh-100"><!--makes the column half the page-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Newly Added</h5> <!-- card will show books recently added-->
                    </div>
                    <div class="card-body"><!--contains the main information on my card-->
                        <div class="row row-eq-height">
                            <div class="col-md-4 vh-25">
                                <?php
                                $sql = "select * from book where copies >0 order by DateAdded desc"; // selects the books with the newest date added
                                $ctr = 0;
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($ctr < 3) { // only displays 3 new books
                                            $pic = $row["img"];
                                            echo "<img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">"; //displays the book image
                                            echo "</div>";
                                            echo "<div class=\"col-md-4 vh-25\">";
                                            $ctr++;
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 vh-100"><!-- makes the column half of the page-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Recently Returned</h5> <!--card that will display the books recently returned-->
                    </div>
                    <div class="card-body">
                        <div class="row row-eq-height">
                            <div class="col-md-4 vh-25"><!-- keeps the rows and columns the same size-->
                                <?php
                                $sql = "select * from book where copies > 0 order by LastUpdated DESC ;"; // will show books that aren't checked out and have been recently returned
                                $ctr = 0;
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($ctr < 3) { // ensures only 3 books are displayed
                                            $pic = $row["img"];
                                            echo "<img src=\".\Books\bookpic\\" . $row["img"] . "\" class=\"card-img-top\" alt=\"BookImage\">";//shows the books image
                                            echo "</div>";
                                            echo "<div class=\"col-md-4 vh-25\">";
                                            $ctr++;
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>