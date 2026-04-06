<?php
// auth/logout.php

session_unset();
session_destroy();
session_start(); // Flash mesajı atayabilmek için yeni bir oturum başlat

$_SESSION['flash'] = [
    'type' => 'success',
    'message' => 'Başarıyla çıkış yaptınız. Görüşmek üzere!'
];

header("Location: index.php?page=home");
exit;
?>
