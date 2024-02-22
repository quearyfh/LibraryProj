<?php
include("..\Connection.php"); // connects to database
$OGISBN = $_GET['ISBN']; // gets the original isbn from the url in case it is changes
$title = $_POST["title"]; // the posted field values from the form
$author = $_POST["author"];
$ISBN = $_POST["ISBN"];
$copies = $_POST["copies"];
$genre = $_POST["genre"];
$img = $_POST["img"];

$sql = "update book set title='$title',author='$author',ISBN='$ISBN',copies='$copies', genre='$genre', img='$img' where ISBN='$OGISBN';";
// ^^ the sql statement to update all fields with information gathered
mysqli_query($conn, $sql);
echo "<script type=\"text/javascript\"> alert(\"The book has been changed!\"); </script>"; // alerts the user the field has been changed
header("refresh:0.2; url=AdminBook.php"); // will take them back to admin book