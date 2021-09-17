<!-- 
    author: NUR NAJWA BINTI AB RAHMAN CB19117
    MODULE 4
 -->
 <html>
<!--THIS CODING TO UPDATE DATA FROM GOODLIST2-->
<link rel="stylesheet" type="text/css" href="CSS.css">
<center>
<?php

 include ("controller.php");
 extract( $_POST );
 $dateReceived= $_POST['dateReceived'];
 
 $query = "UPDATE parcel SET status='Receives', dateReceived='$dateReceived' WHERE parcelId='$parcelId'";
if (mysqli_query($conn, $query)){
		echo "your record already update";
	}
	else {
		echo "your record fail to update.";
	}	
 ?>
 <a href="goodlist1.php"><input type="submit" value="BACK"></a>
 </center>
</html>
