<?php
// auth/logout.php — Linux.devops Logout
session_start();
session_unset();
session_destroy();
session_start();

$_SESSION['flash_msg'] = [
    'type' => 'info',
    'message' => 'Oturumunuz kapatildi.'
];

header("Location: index.php?page=home");
exit;
