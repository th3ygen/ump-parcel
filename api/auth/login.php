<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

    session_start();
    
    include('../../config.php');
    include('../../common/db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * from user WHERE username = "'.$username.'"';

    $hash = '';
    $user;
    if ($res = $mysqli->query($query)) {
        
        if (!$res->num_rows > 0) {
            return header('Location: '.URL.'/index.php?error=401');
        }
        
        $user = $res->fetch_assoc();

        if (!$user) {
            return header('Location: '.URL.'/index.php?error=401');
        }

        if ($user['active'] == '0') {
            return header('Location: '.URL.'/index.php?error=401');
        }

        /* verify password hash */
        if (password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['job'] = $user['job'];
            
            /* update last activity date */
            $mysqli->query('UPDATE user SET lastActive='.round(microtime(true) * 1000).' WHERE id = '.$user['id']);
            $mysqli->query('INSERT INTO activity (userId, date) VALUES ('.$user['id'].', "'.date('Y-m-d').'")');

            /* remember user in cookie */
            if (isset($_POST['remember'])) {
                setcookie('remember_username', $_POST['username'], time() + (30 * 365 * 24 * 60 * 60), '/', null);
                setcookie('remember_password', $_POST['password'], time() + (30 * 365 * 24 * 60 * 60), '/', null);
                setcookie('remember', 'true', time() + (30 * 365 * 24 * 60 * 60), '/', null);
            } else {
                setcookie('remember_username', $_POST['username'], time() - 3600, '/', null);
                setcookie('remember_password', $_POST['password'], time() - 3600, '/', null);
                setcookie('remember', 'true', time() - 3600, '/', null);
            }

            switch ($user['role']) {
                case 'user':
                    switch ($user['job']) {
                        case 'student':
                            return header('Location: '.URL.'/recipient/goodlist1.php');
                        case 'warden':
                            return header('Location: '.URL.'/collection');
                        case 'officier':
                            return header('Location: '.URL.'/arrival');
                        default: 
                            return header('Location: '.URL.'/recipient/goodlist1.php');
                    }
                case 'admin':
                    return header('Location: '.URL.'/admin/dashboard.php');
                default: break;
            }
        } 

    }

    header('Location: '.URL.'/index.php?error=401');
?>