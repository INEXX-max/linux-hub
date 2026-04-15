<?php
// auth/login.php — NEXOS Real Login with SQLite
require_once 'includes/header.php';

if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    
    if(empty($email) || empty($password)){
        setFlashMessage('error', 'Tum alanlari doldurun.');
        redirect('index.php?page=login');
    }
    
    $user = loginUser($email, $password);
    if($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        setFlashMessage('success', 'Hosgeldin, ' . htmlspecialchars($user['username']) . '!');
        redirect('index.php?page=dashboard');
    } else {
        setFlashMessage('error', 'E-posta veya sifre hatali.');
        redirect('index.php?page=login');
    }
}
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon"><i class="fa-solid fa-terminal"></i></div>
            <h2>Sisteme Giris</h2>
            <p>Erisim bilgilerinizi dogrulayin.</p>
        </div>
        
        <form method="POST" action="index.php?page=login" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@email.com" required>
            </div>
            <div class="form-group">
                <label class="form-label">Sifre</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>
            <button type="submit" name="login" class="btn-gradient w-full" style="justify-content:center;">
                <i class="fa-solid fa-right-to-bracket"></i> Giris Yap
            </button>
        </form>
        
        <div class="nx-auth-footer">
            Hesabiniz yok mu? <a href="index.php?page=register">Hemen Kayit Olun</a>
            <br><br>
            <a href="index.php?page=forgot-password" style="font-size:var(--nx-fs-xs); color:var(--nx-text-muted);">Sifremi Unuttum</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
