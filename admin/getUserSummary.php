<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/


include('../common/db.php');

$totalUsers = 0;
$totalDisabled = 0;
$lastActivity = '';

if ($users = $mysqli->query('SELECT COUNT(id) AS totalUsers FROM user')) {
    if ($users->num_rows > 0) {
        $totalUsers = $users->fetch_assoc()['totalUsers'];
    }
}
if ($disabled = $mysqli->query('SELECT COUNT(id) AS totalUsers FROM user WHERE active = 0')) {
    if ($disabled->num_rows > 0) {
        $totalDisabled = $disabled->fetch_assoc()['totalUsers'];
    }
}

if ($userActivities = $mysqli->query('SELECT * FROM activity ORDER BY date DESC')) {
    if ($userActivities->num_rows > 0) {
        $latest = $userActivities->fetch_assoc();

        $lastActivity = $latest['date'];
    }
}

echo json_encode(array(
    'totalUsers' => $totalUsers,
    'totalDisabled' => $totalDisabled,
    'lastActivity' => $lastActivity
));