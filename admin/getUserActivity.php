<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

include('../common/db.php');

$query = 'SELECT * FROM activity WHERE YEAR(date) = YEAR(CURDATE())';

$result = [0,0,0,0,0,0,0,0,0,0,0,0];
if ($res = $mysqli->query($query)) {
    if ($res->num_rows > 0) {

        while ($activity = $res->fetch_assoc()) {
            /* loop for each months in current year*/
            for ($m = 1; $m <= 12; $m++) {
                if (date('m', strtotime($activity['date'])) == '0'.$m) {
                    $result[$m - 1]++;
                }
            }
        }

        echo json_encode($result);
    }
}
