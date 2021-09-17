<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

    include('../../common/db.php');

    $username = 'edel';

    $query = 'SELECT * FROM user WHERE username = "' . $username . '"';
    
    if ($res = $mysqli->query($query)) {
        if ($res->num_rows > 0) {
            $user = $res->fetch_assoc();

            $hash = $user['password'];

            if (password_verify('edel', $hash)) {
                echo 'yes';
            } else {
                echo 'no';
            }
            
        }
    }
?>