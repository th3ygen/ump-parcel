<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

session_start();

include('../common/db.php');

if (isset($_SESSION['userid']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        
        $res;
        /* validate username */
        if ($res = $mysqli->query('SELECT username FROM user WHERE username = "'.$_POST['username'].'"')) {
            if ($res->num_rows > 0) {
                echo json_encode(array(
                    'status' => 400,
                    'message' => 'Username already exists'
                ));
                return;
            }
        }

        /* validate matrix id, if provided */
        $matrixId = '';
        if (isset($_POST['matrixId'])) {
            if ($res = $mysqli->query('SELECT matrixId FROM user WHERE matrixId = "'.$_POST['matrixId'].'"')) {
                if ($res->num_rows > 0) {
                    echo json_encode(array(
                        'status' => 400,
                        'message' => 'Matrics Id already used'
                    ));
                    return;
                }
                
            }

            $matrixId = $_POST['matrixId'];
        }

        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        /* store into db */
        if ($res = $mysqli->query('INSERT INTO user (username, password, matrixId, role, lastActive) VALUES ("'.$_POST['username'].'", "'.$hash.'", "'.$matrixId.'", "'.$_POST['role'].'", '.round(microtime(true) * 1000).')')) {
            echo json_encode(array(
                'status' => 200,
                'message' => 'New user created'
            ));
            return;
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