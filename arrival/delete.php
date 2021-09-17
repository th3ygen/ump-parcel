<!-- 
    author: JOACHIM A/L AGOSTAIN CA20017
    MODULE 2
 -->
<!-- delete.php -->
<!-- To delete one particular data. -->

<?php

include("dbase.php");

$idURL = $_GET['id'];

$query = "DELETE FROM arrival WHERE id = '$idURL'";
$result = mysqli_query($conn, $query) or die("Could not execute query in edit.php");

if ($result) {
    echo "<script type= 'text/javascript'> window.location='index.php'</script>";
}
?>