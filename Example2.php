<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>FQ University</title>
    <?php session_start(); require('Connection.php');?>
</head>

<body class ="text-bg-light">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">FQ_Database</a>
            </div>
            <ul class="navbar-nav me-auto"> <!-- The top navigation bar that allows you to go between different pages  -->
                <li class="nav-item"><a class="nav-link" href="FQ_SS_FP.html">Home</a></li>
                <li class="nav-item active"> <a class="nav-link" >University</a></li>
                <li class="nav-item"><a class="nav-link" href="Department.php">Department</a></li>
            </ul>
        </div>
`   </nav>
    <div class="jumbotron bg-light mb-3 "> <!--My header again  -->
        <div class="row">
            <div class="col-2">
                <?php
                    $College = $_GET['Colleges'];
                    echo "<img class=\"card-img-top\" src= \"$College.png\" alt=\"$College picture\">";
                ?>
            </div>
            <div class="col-8">
                <h1 class="text-center">Universities of America</h1>
                <p class="lead text-center"> This page will describe the Schools and Departments within a University</p>
                <hr class="my-4">
                <p class="text-center">
                <?php
                    echo "<b><big> About $College</big> </b><br>";
                    $sql = "select * from university where name = '$College'"; 
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo "<b>Address: </b>". $row["address"] ." " . $row["location"] . "<br>";
                    echo "<b> President: </b>" . $row["president"] . "<br>";
                ?>
                </p>
            </div>
            <div class="col-2">
                <?php
                    echo "<img class=\"card-img-top\" src= \"$College.png\" alt=\"$College picture\">";
                ?>
            </div>
        </div>
        
    </div>
    <div class= "container-fluid content-row">
        <div class = "row row-eq-height">
            <?php
                if ($College== "Trine") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#164978;\">";
                } // this if statment makes the two columns the schools primary colors
                elseif($College== "RoseHulman") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#800000;\">";
                }
                elseif($College== "LawerenceTech") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#06C;\">";
                }
                else{
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#00549A;\">";
                }         
            ?>
                <h3 class="text-white"> Which school would you like to explore? <br></h3>
                <form name="SchoolsForm" action="" method="post">
                    <select name="Schools" size="3" style="width: 250px" action="" method="post">
                        <?php
                            $sql = "select name from schools";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
                                }
                            }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" name="submitschools" value="Submit School Choice" /> <!-- I have input buttons because I learned php and javascript do not like each other very much
                                                                                                    This allows me to keep the value of my select options code  -->
                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>; <!-- how I get the colors to go further down the column-->
                </form>
            </div>
            <?php
                if ($College== "Trine") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#B3B2B1;\">";
                } // the other column of the schools primary colors
                elseif($College== "RoseHulman") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color: #B3B2B1;\">";
                }
                elseif($College== "LawerenceTech") { 
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:silver;\">";
                }
                else{
                    echo "<div class=\"col-lg-6 text-center \" style=\"background-color:#FFCD4D;\">";
                }         
            ?>
                <form name="Dept form" action="" method="post">
                <?php
                    if (isset($_POST["submitschools"])) {
                        if(!empty($_POST["Schools"])) {
                            $selected = $_POST["Schools"];
                            echo "<h4 class=\"text-white\"> The $selected School has the departments: </h4>";
                            echo "<select name=\"Depts\" size=\"3\" style=\"width: 250px\">";
                            $sql = "select name from departments d where EXISTS (select deptname from ismadeof m where m.deptname =d.name AND schoolname=\"$selected\");"; // this is so they only get the departments within the school
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value= " . $row["name"] . ">" . $row["name"] . "</option>";
                                }
                            }
                            echo "</select><br><br>";
                            echo "<input type=\"submit\" name=\"submitdept\" value=\"Learn more about this Department\" />";
                        }
                        else{
                            echo "<script type=\"text/javascript\"> alert(\"You must select a School first!\"); </script>"; // this is where I use javascript
                            // I used to have more but then php hates javascript and I used the php form functions to change the texts instead of javascript
                        }
                    }
                    ?>   
                </form>
                <?php
                    if (isset($_POST["submitdept"])) {
                        if (!empty($_POST["Depts"])) {
                            $selected = $_POST["Depts"];
                            $_SESSION["deptname"] = $selected; // I used sessions between the php files instead of posting to the url like I did in html 
                            $_SESSION["Colleges"]= $College; // this allows the information to stay a little more private and not busy up my URL
                            echo " <script type=\"text/javascript\"> window.location.replace(\"Department.php\"); </script> ";
                        }
                        else{
                            echo "<script type=\"text/javascript\"> alert(\"You must select a department first!\"); </script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>