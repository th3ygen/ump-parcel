<!-- 
    author: JOACHIM A/L AGOSTAIN CA20017
    MODULE 2
 -->
<!-- fill-in.php -->
<!-- To insert data of enter.php into database. -->
<?php

include("dbase.php");

//Get Entry Date And Time
extract($_POST);
$query = "INSERT INTO arrival (Tracking,Sender,Student,Phone,Arrived,Status) VALUES('$Tracking','$Sender','$Student','$Phone','$Arrived','$Status')";

if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'> window.location='index.php' </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>