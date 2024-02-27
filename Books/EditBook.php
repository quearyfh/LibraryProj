<!-- Html page for admin's to edit books -->
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
    include("..\AdminHeader.php"); // admin header?>
</head>

<body class="text-bg-light"><!-- makes backgroun grey-->
    <div class="container-fluid content-row">
        <div class="row row-eq-height">
            <div class="col-lg-4 vh-100"><!-- side column with admin book options-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Options</h5> <!-- card that shows book options-->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center "> <a class="nav-link" href="AdminBook.php">View
                                Books</a> </li><!--clickable links with admin options-->
                        <li class="list-group-item text-center "> <a class="nav-link" href="AddBook.php">Add
                                Book</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 vh-100"><!-- the main column-->
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-center text-white">Edit Book Information</h5>
                        <!-- card that encompasses book form -->
                    </div>
                    <div class="card-body text-center">
                        <?php
                            $ISBN = $_GET['ISBN'];
                            $sql = "select * from book where ISBN = $ISBN"; // selects the book based on ISBN
                            echo "
                        <form name =\"UpdateBook\" method= \"post\" action= \"UpdateBook.php?ISBN=$ISBN\">
                            <h5> Change the field you would like to update</h5><br>
                            ";
                            // ^^ creates a form that will go to UpdateBook.php when submitted
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                            }
                            echo "
                            <p><b>Title:</b><br>
                            <input type=\"text\" name=\"title\" required min=\"2\" value='" . $row['title'] . "'required>
                            </p>

                            <p><b>Author:</b><br>
                            <input type=\"text\" name=\"author\" required min=\"2\" value='" . $row['author'] . "'required onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                            </p>

                            <p><b>ISBN:</b><br>
                            <input type=\"text\" name=\"ISBN\" pattern=\"[0-9]{13}\"  value='" . $row['ISBN'] . "' required>
                            </p>

                            <p><b>Copies:</b><br>
                            <input type=\"number\" name=\"copies\" value='" . $row['copies'] . "'required min=\"1\">
                            </p>

                            <p><b>Genre:</b><br>
                            <input type=\"text\" name=\"genre\"  required min=\"2\" value='" . $row['genre'] . "'required onkeydown=\"return /[a-zA-Z]/i.test(event.key)\">
                            </p>

                            <p><b>Image Name:</b><br>
                            <input type=\"text\" name=\"img\"  required min=\"2\" value='" . $row['img'] . "'required>
                            </p>

                            
                            ";
                            // the above echo is a form that has required inputs for book information
                            // the inputs are already filled in with the current information, the user must change the field they want updated
                            ?>

                        <button type="submit" class="btn btn-md btn-success">Change
                            Book</button> <!-- the submit button to update form-->
                        <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>