<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

    $configs = array(
        'hostname' => 'localhost',
        'db_username' => 'root',
        'db_password' => '\#@Fx9rnd(W18p&9',
        'db_name' => 'id17026802_ump_parcel'
    );

    $mysqli = new mysqli($configs['hostname'], $configs['db_username'], $configs['db_password'], $configs['db_name']);

    if ($mysqli->errno) {
        print 'Error connecting to DB, ' . $mysqli->error;
        throw new Exception('Error connecting to DB, ' . $mysqli->error);
    }
?>