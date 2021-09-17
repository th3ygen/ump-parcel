<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

session_start();

include('../common/db.php');

if (isset($_SESSION['userid']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {

        if (isset($_POST['username'])) {

            $query = 'UPDATE user SET 
                active="'.$_POST['active'].'",
                role="'.$_POST['role'].'",
                phoneNum="'.$_POST['phoneNum'].'",
                email="'.$_POST['email'].'",
                matrixId="'.$_POST['matrixId'].'",
                firstname="'.$_POST['firstname'].'",
                lastname="'.$_POST['lastname'].'",
                resident="'.$_POST['resident'].'" 
                WHERE username = "'.$_POST['username'].'"
            ';

            if ($res = $mysqli->query($query)) {
                echo 200;
            }
        }
    }
}

