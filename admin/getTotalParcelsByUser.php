<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

include('../common/db.php');

$query = 'SELECT * FROM user WHERE role = "user"';

$res = $mysqli->query($query);

$result = array();

if ($res->num_rows > 0) {
    while ($user = $res->fetch_assoc()) {
        $q = 'SELECT * FROM parcel WHERE recipientId = '.$user['id'];

        $c = $mysqli->query($q);

        $result[$user['username']] = $c->num_rows;
    }
}

echo json_encode($result);