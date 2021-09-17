<!-- 
    author: NUR NAJWA BINTI AB RAHMAN CB19117
    MODULE 4
 -->
 <?php

$servername = "localhost";
$dBUsername = "id17026802_root";
$dBPassword = "\#@Fx9rnd(W18p&9";
$dBName = "ump_parcel";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
?>