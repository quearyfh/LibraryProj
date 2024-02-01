<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Library Home </title>
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
    <div class= "container-fluid content-row">

        <div class = "row row-eq-height">
        <div class="col-lg-6 vh-100">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center">Newly Added</h5>
                </div>
                <div class="card-body">
                    <div class = "row row-eq-height">
                            <div class="col-md-4 vh-25">
                                <img src="..." class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-4 vh-25">
                                <img src="..." class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-4 vh-25">
                                <img src="..." class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6 vh-100">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-center">Recently Returned</h5>
                </div>
                <div class="card-body">
                    <div class = "row row-eq-height">
                        <div class="col-md-4 vh-25">
                            <img src="..." class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-4 vh-25">
                            <img src="..." class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-4 vh-25">
                            <img src="..." class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


    


</body>