<?php
// auth/login.php — NEXOS Login
require_once 'includes/header.php';

if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    if(empty($email) || empty($password)){
        setFlashMessage('error', 'Lütfen tüm alanları doldurun.');
    } else {
        if(strlen($password) >= 6) {
            $_SESSION['user_id'] = mt_rand(100, 9999);
            $_SESSION['username'] = explode('@', $email)[0];
            $_SESSION['role'] = 'user';
            setFlashMessage('success', 'Tebrikler! Sisteme başarıyla giriş yapıldı.');
            redirect('index.php?page=dashboard');
        } else {
            setFlashMessage('error', 'Şifre en az 6 karakter olmalıdır.');
        }
    }
}
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon"><i class="fa-solid fa-terminal"></i></div>
            <h2>Sisteme Giriş</h2>
            <p>Erişim bilgilerinizi doğrulayın.</p>
        </div>
        
        <form method="POST" action="index.php?page=login" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@nexos.dev" required>
            </div>
            <div class="form-group">
                <label class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="d-flex justify-between items-center mb-6">
                <label style="display:flex; align-items:center; gap:8px; font-size:var(--nx-fs-sm); color:var(--nx-text-muted); cursor:pointer;">
                    <input type="checkbox" name="remember" style="accent-color:var(--nx-blue);"> Beni Hatırla
                </label>
                <a href="index.php?page=forgot-password" style="font-size:var(--nx-fs-sm);">Şifremi Unuttum</a>
            </div>
            <button type="submit" name="login" class="btn-gradient w-full" style="justify-content:center;">
                <i class="fa-solid fa-right-to-bracket"></i> Giriş Yap
            </button>
        </form>
        
        <div class="nx-auth-footer">
            Hesabınız yok mu? <a href="index.php?page=register">Hemen Kayıt Olun</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
