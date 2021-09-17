<!-- 
    author: NUR NAJWA BINTI AB RAHMAN CB19117
    MODULE 4
 -->
 <?php

include('../common/db.php');

if ($res = $mysqli->query('UPDATE parcel SET status="Receives" WHERE trackingNum = "'.$_GET['trackNum'].'"')) {
    header('Location: http://localhost/sites/ump-parcel/recipient/goodlist1.php');
}