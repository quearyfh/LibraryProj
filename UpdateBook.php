<?php
    include("Connection.php");
    $title=$_POST["title"];
    $author=$_POST["author"];
    $ISBN=$_POST["ISBN"];
    $copies=$_POST["copies"];
    $genre=$_POST["genre"];
    $img=$_POST["img"];

    $sql="delete from book where ISBN = '$ISBN'";
    mysqli_query($conn,$sql);

    $sql="insert into book (title, author, ISBN, copies, genre, img) VALUES('$title','$author','$ISBN', '$copies', '$img');";
    if (mysqli_query($conn, $sql)) {
        echo "<script type=\"text/javascript\"> alert(\"The book has been changed!\"); </script>";
        header("refresh:0.2; url=AdminBook.php");
    }
    
    
?>