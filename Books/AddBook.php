<!-- HTML page to add book -->
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
    <?php session_start(); require('..\Connection.php');?>
</head>

<body class="text-bg-light">
    <div class="well bg-dark text-white text-center">ADMIN ACCESS</div>
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
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"..\Users\Profile.php\"><b>" . $row["fname"] . " " . $row["lname"] . "</b></a></li>";
                        if($_SESSION["status"] == 'admin'){
                           echo "<li class=\"nav-item dropdown\">
                           <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\">Admin Pages</a>
                           <ul class=\"dropdown-menu\">
                               <li><a class=\"dropdown-item\" href=\"AdminBook.php\">Book Access</a></li>
                               <li><a class=\"dropdown-item\" href=\"..\Users\AdminUsers.php\">User Access</a></li>
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
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success"><a class="nav-link"
                    href="..\Home.php">Home</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success"><a class="nav-link"
                    href="..\Catalog.php">Catalog</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link" href="..\Checkout.php">Check
                    Out</a></button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link" href="..\ReturnBook.php">Return
                    Books</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <!-- ^^ above code is explained on the Home.php file, it is the same for every page -->
    <div class="vr"></div>
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <!-- makes all my rows the same height-->
            <div class="col-lg-4 vh-100">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Options</h5> <!-- card shows my book options -->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminBook.php">View
                                Books</a> </li> <!-- clickable links to that take you to other pages -->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddBook.php">Add Book</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Add Book Information</h5>
                        <!-- card encompasses my form-->
                    </div>
                    <div class="card-body text-center">
                        <form name="CreateBook" method="post" action="createBook.php">
                            <p><b>Title:</b><br>
                                <input type="text" name="title" minlength="2" required>
                                <!-- makes input required to not be null -->
                            </p>

                            <p><b>Author:</b><br>
                                <input type="text" name="author" minlength="2" required
                                    onkeydown="return /[a-zA-Z]/i.test(event.key)">
                                <!-- ^^ the onkeydown makes sure they only enter letters-->
                            </p>

                            <p><b>ISBN:</b><br>
                                <input type="text" name="ISBN" pattern="[0-9]{13}" required>
                                <!-- will only accept numbers as an input-->
                            </p>

                            <p><b>Copies:</b><br>
                                <input type="number" name="copies" required min="1">
                            </p>

                            <p><b>Genre:</b><br>
                                <input type="text" name="genre" minlength="2" required
                                    onkeydown="return /[a-zA-Z]/i.test(event.key)">
                            </p>

                            <p><b>Image Name:</b><br>
                                <input type="text" name="img" minlength="2" required>
                            </p>

                            <button type="submit" class="btn btn-md btn-success">Submit
                                Book</button> <!-- the submit form button -->
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>