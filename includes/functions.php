<?php
// includes/functions.php — Linux.devops Core Functions
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/database.php';

// XSS Korumasi
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Yonlendirme
function redirect($url) {
    header("Location: $url");
    exit;
}

// Login Kontrolu
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Flash Mesajlari
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
        
        $color = '#4f8fff';
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

// Kullanici kayit
function registerUser($username, $email, $password) {
    $db = getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:u, :e, :p)");
    $stmt->execute([':u' => $username, ':e' => $email, ':p' => $hash]);
    return $db->lastInsertId();
}

// Kullanici giris
function loginUser($email, $password) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :e LIMIT 1");
    $stmt->execute([':e' => $email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

// Sifre guncelleme
function updatePassword($email, $newPassword) {
    $db = getDB();
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $db->prepare("UPDATE users SET password = :p WHERE email = :e");
    $stmt->execute([':p' => $hash, ':e' => $email]);
    return $stmt->rowCount() > 0;
}

// Email kontrolu
function emailExists($email) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id FROM users WHERE email = :e LIMIT 1");
    $stmt->execute([':e' => $email]);
    return $stmt->fetch() ? true : false;
}

// Kullanici adi kontrolu
function usernameExists($username) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id FROM users WHERE username = :u LIMIT 1");
    $stmt->execute([':u' => $username]);
    return $stmt->fetch() ? true : false;
}

// Favori ekle
function addFavorite($userId, $distroId) {
    $db = getDB();
    $stmt = $db->prepare("INSERT OR IGNORE INTO favorites (user_id, distro_id) VALUES (:u, :d)");
    $stmt->execute([':u' => $userId, ':d' => $distroId]);
}

// Favorileri getir
function getUserFavorites($userId) {
    $db = getDB();
    $stmt = $db->prepare("SELECT distro_id FROM favorites WHERE user_id = :u ORDER BY created_at DESC");
    $stmt->execute([':u' => $userId]);
    return array_column($stmt->fetchAll(), 'distro_id');
}

// Favori sil
function removeFavorite($userId, $distroId) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM favorites WHERE user_id = :u AND distro_id = :d");
    $stmt->execute([':u' => $userId, ':d' => $distroId]);
}

// Quiz sonucu kaydet
function saveQuizResult($userId, $distroId, $answersJson) {
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO quiz_results (user_id, recommended_distro_id, answers_json) VALUES (:u, :d, :a)");
    $stmt->execute([':u' => $userId, ':d' => $distroId, ':a' => $answersJson]);
}

// Son quiz sonucu
function getLastQuizResult($userId) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM quiz_results WHERE user_id = :u ORDER BY created_at DESC LIMIT 1");
    $stmt->execute([':u' => $userId]);
    return $stmt->fetch();
}
