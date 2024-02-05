<?php
    session_start(); 
    include("Connection.php");
    $ISBN = $_GET['ISBN'];

    $sql="delete from book where ISBN = '$ISBN'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        echo "The book has been removed";
        header("refresh:1; url=AdminBook.php");
    }
    else{
        echo "The book has NOT been removed";
        header("refresh:1; url=AdminBook.php");
    }
    
?>