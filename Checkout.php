<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Library</title>
    <?php session_start(); require('Connection.php');?>
</head>

<body class ="text-bg-light">
    <div class="well bg-dark text-white text-center" >Open from 8am - 5pm at 12345 Example St. IN</div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav"> </ul> <!-- required to make login on the right-->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"> PERSON_NAME</li>
                <li class="nav-item"><a class="nav-link" href="FQ_SS_FP.html">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <h1>This is a Library</h1>
    </div>
    <div class="well bg-dark " > .   </div>
    <div class="vr"></div>
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0"><t></t>Home</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0">Catalog</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0">Check Out</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-lg btn-success rounded-0"> Return Books </button>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <!-- <div class="well bg-light " > .   </div> -->
    <div class="vr"></div> 


<div class="well bg-dark " >" "</div>

<div class="row">
    <div class="col-2"></div>
    <div class="col-2"> 
        <p class="text-end lh-2 fs-4">BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. </p>
    </div>
    <div class="col-6"> 
        <p class="text lh-3 fs-3"> Title: <br> Author: <br> ISBN/ISBN13 <br> Date Checked Out: <br> Date to Return by: </p> 
    </div>
    <div class="col"></div>
<hr>
<div class="row">
    <div class="col-2"></div>
    <div class="col-2"> 
        <p class="text-end lh-2 fs-4">BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. <br> BOOK PLACEHOLDER. </p>
    </div>
    <div class="col-6"> 
        <p class="text lh-3 fs-3"> Title: <br> Author: <br> ISBN/ISBN13 <br> Date Checked Out: <br> Date to Return by: </p> 
    </div>
    <div class="col"></div>
<hr>

</body>