<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/


include('../config.php');
include('../common/db.php');

if ($_POST['action'] == 'insert') {
    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = 'INSERT INTO user 
    (username, password, active, lastActive, role, phoneNum, email, matrixId, notify, firstname, lastname) VALUES 
    ("' . $_POST['username'] . '", "' . $hash . '", 1, ' . time() . ', "user", "-", "-", "-", "", "-", "-")';

    echo $query;

    $mysqli->query($query);

    header('Location: http://localhost/sites/ump-parcel/admin/users.php');
}
?>