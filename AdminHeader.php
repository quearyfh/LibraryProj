<!DOCTYPE html> 
<!--Same header but with different directories for admin rights-->
<div class="well text-center bg-dark text-white">ADMIN ACCESS</div> <!-- banner at top of page-->
    <div class="row row-eq-height "> <!--keeps all my rows equal-->
        <div class="col-lg-1 fw-bold text-center"><!--displayed the first words in bolder-->
            <h3>This<br> is A</h3>
        </div>
        <div class="col-lg-3 text-right text-success fw-bolder fst-italic "><!--bolder, bigger and in italics-->
            <p class="fs-1">Library</p>
        </div>
        <div class="col-lg-4 ms-auto text-end"><!--alines with the right edge more-->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <?php
                            $ucard = $_SESSION["ucard"]; // getting the ucard from the session
                            $sql = "select * from member where ucard = '$ucard'"; // selecting all info about current user
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"..\Users\Profile.php\"><b>" . $row["fname"] . " " . $row["lname"] . "</b></a></li>";
                            //^^ displays their first and last name in bold, clickable link to their profile page
                            if ($_SESSION["status"] == 'admin') { // if they are an admin a dropdown will appear
                                echo "<li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\">Admin Pages</a>
                                <ul class=\"dropdown-menu\">
                                    <li><a class=\"dropdown-item\" href=\"..\Books\AdminBook.php\">Book Access</a></li> 
                                    <li><a class=\"dropdown-item\" href=\"..\Users\AdminUsers.php\">User Access</a></li>
                                </ul>
                                </li> ";
                                // the echo above is a dropdown menu with two options for book and user access, only admins can see this
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="..\Logout.php">Log Out</a></li><!-- will logout the user when pressed-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <hr><!--The cute line that seperates parts of my header-->
    
    <div class="row">
        <div class="col-sm-2"></div><!--spacer column-->
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\Home.php">Home</a></button> <!-- button to go to home page-->
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\Catalog.php">Catalog</a></button><!-- button to go to catalog page-->
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success "><a class="nav-link"
                    href="..\Checkout.php">Check Out</a></button><!-- button to go to check out page-->
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success"><a class="nav-link"
                    href="..\ReturnBook.php">Return Books</a></button><!-- button to go to return page-->
        </div>
        <div class="col-sm-2"></div> <!--another spacer column-->
    </div>
    <div class="vr"></div> <!-- just some spacing-->