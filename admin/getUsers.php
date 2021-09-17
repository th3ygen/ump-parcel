<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/


include('../common/db.php');

$query = 'SELECT * FROM user ';

if ($_GET['r'] != '0') {
    $query .= ' WHERE resident = "KK'.$_GET['r'].'" AND role = "user"';
} else {
    $query .= ' WHERE role = "user"';
}



$res = $mysqli->query($query);
$result = [];

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $result[] = $row;
    }
    
    echo json_encode($result);
} else {
    echo '';
}