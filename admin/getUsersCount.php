<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/


include('../common/db.php');

$query = 'SELECT COUNT(id) AS count FROM user ';

if (isset($_GET['r'])) {
    if ($_GET['r'] != '0') {
        $query .= ' WHERE resident = "KK'.$_GET['r'].'" AND role ="user"';
    } else {
        $query .= ' WHERE role ="user"';
    }
} else if (isset($_GET['role'])) {
    $query .= ' WHERE role = "'.$_GET['role'].'"';
}

$res = $mysqli->query($query);

echo $res->fetch_assoc()['count'];