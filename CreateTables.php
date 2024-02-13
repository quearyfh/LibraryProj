<?php
include("Connection.php");

$sql = "Create Table member(
        fname varchar(20) NOT NULL,
        lname varchar(20) NOT NULL,
        Ucard int primary key,
        Phone varchar(10) NOT NULL,
        address varchar(35) NOT NULL,
        status varchar(10)
    );";

$sql .= "Create Table book(
        title varchar(35) NOT NULL,
        author varchar(30) NOT NULL,
        ISBN int primary key,
        copies int NOT NULL
    );";

$sql .= "create table reserve(
        Ucard int,
        ISBN int,
        dateborrowed date,
        constraint fk_UC foreign key (Ucard) references member(Ucard),
        constraint fk_st foreign key (ISBN) references book(ISBN)
    );";

// I only ran this file once to make all my tables
if (mysqli_multi_query($conn, $sql)) {
    echo "";
    echo "Table sucessfully created";
} else {
    echo "error creating Table";
}
?>