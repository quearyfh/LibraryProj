<?php
    session_start(); 
    include("..\Connection.php");
    $ucard=$_POST["ucard"];
    $phone=$_POST["phone"];

    $sql="select * from member where ucard='$ucard' and RIGHT(phone,4) = '$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["ucard"] = $ucard;
        if($row["status"] != 'User'){
            $_SESSION["status"] = 'admin';
            header("refresh:0.2; url=..\Home.php");
        }
        else{
            $_SESSION["status"] = 'member';
            header("refresh:0.2; url=..\Home.php");
        }  
    }
    else{
        echo "<h1> Your Login Information is incorrect</h1>";
        header("refresh:0.5; url=..\Login.php");
    }
    
?>