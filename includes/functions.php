<?php
// includes/functions.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// XSS Koruması
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Yönlendirme
function redirect($url) {
    header("Location: $url");
    exit;
}

// Login Kontrolü
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Flash Mesajları
function setFlashMessage($type, $message) {
    $_SESSION['flash_msg'] = [
        'type' => $type,
        'message' => $message
    ];
}

function displayFlashMessage() {
    if (isset($_SESSION['flash_msg'])) {
        $type = $_SESSION['flash_msg']['type'];
        $message = $_SESSION['flash_msg']['message'];
        
        $color = '#3b82f6';
        if($type === 'success') $color = '#10b981';
        if($type === 'error') $color = '#ef4444';
        if($type === 'warning') $color = '#f59e0b';
        
        echo "<div id='flash-message' style='background-color: {$color}; color: white; padding: 15px; text-align: center; position: fixed; top: 0; left: 0; width: 100%; z-index: 9999;'>";
        echo $message;
        echo "</div>";
        echo "<script>setTimeout(() => { document.getElementById('flash-message').style.display = 'none'; }, 4000);</script>";
        
        unset($_SESSION['flash_msg']);
    }
}
?>
