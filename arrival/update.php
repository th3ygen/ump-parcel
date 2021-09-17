<!-- 
    author: JOACHIM A/L AGOSTAIN CA20017
    MODULE 2
 -->
<!--update.php-->
<!--To update data of edit.php into database.-->
<?php
include("dbase.php");

extract($_POST);

//Get Entry Date And Time

$query = "UPDATE arrival SET Tracking = '$Tracking', Sender = '$Sender', Student = '$Student', Phone = '$Phone', Arrived = '$Arrived', Status = '$Status' WHERE id = '$id'";

$result = mysqli_query($conn, $query) or die("Could not execute query in edit.php");
if ($result) {
    echo "<script type = 'text/javascript'> window.location='index.php' </script>";
}
?>