<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

session_start();

include('../common/db.php');

if (isset($_SESSION['userid']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {

        if (isset($_GET['username'])) {
            if ($res = $mysqli->query('DELETE FROM user WHERE username = "'.$_GET['username'].'"')) {
                echo 'deleted';
            } else {
                echo 'error deleting', $_GET['username'];
            }

        }
    }
}
