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

            if ($res = $mysqli->query('SELECT * FROM user WHERE username = "' . $_GET['username'] . '"')) {
                if ($res->num_rows > 0) {
                    echo json_encode(array(
                        'status' => 200,
                        'message' => json_encode($res->fetch_assoc())
                    ));
                } else {
                    echo json_encode(array(
                        'status' => 404,
                        'message' => 'User not found'
                    ));
                }
            }
        } else {
            echo json_encode(array(
                'status' => 403,
                'message' => 'Missing username'
            ));
        }
    } else {
        echo json_encode(array(
            'status' => 401,
            'message' => 'Unauthorized access'
        ));
    }
} else {
    echo json_encode(array(
        'status' => 401,
        'message' => 'Unauthorized access'
    ));
}
