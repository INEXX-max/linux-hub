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
        if($type === 'info') $color = '#22d3ee';
        
        $icon = 'fa-solid fa-circle-info';
        if($type === 'success') $icon = 'fa-solid fa-circle-check';
        if($type === 'error') $icon = 'fa-solid fa-circle-xmark';
        if($type === 'warning') $icon = 'fa-solid fa-triangle-exclamation';
        
        echo "<div class='flash-message' id='flash-message' style='background: {$color}; border-left: 4px solid rgba(255,255,255,0.3);'>";
        echo "<i class='{$icon}' style='margin-right:8px;'></i> {$message}";
        echo "</div>";
        
        unset($_SESSION['flash_msg']);
    }
}
?>
