<?php
    include("Connection.php");
    $title=$_POST["title"];
    $author=$_POST["author"];
    $ISBN=$_POST["ISBN"];
    $copies=$_POST["copies"];
    $genre=$_POST["genre"];
    $img=$_POST["img"];

    $sql="insert into book (title, author, ISBN, copies, genre, img) VALUES('$title','$author','$ISBN', '$copies', '$genre', '$img');";
    if (mysqli_query($conn, $sql)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been added!\"); </script>";
        header("refresh:0.2; url=AdminBook.php");
    }
    
