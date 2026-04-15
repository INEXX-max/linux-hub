<?php
// auth/register.php — NEXOS Registration
require_once 'includes/header.php';

if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    if(empty($username) || empty($email) || empty($password)){
        setFlashMessage('error', 'Lütfen tüm alanları doldurun.');
    } elseif($password !== $password_confirm) {
        setFlashMessage('error', 'Şifreler eşleşmiyor!');
    } elseif(strlen($password) < 6) {
        setFlashMessage('error', 'Şifreniz en az 6 karakter olmalıdır.');
    } else {
        setFlashMessage('success', 'Hesabınız oluşturuldu! Giriş yapabilirsiniz.');
        redirect('index.php?page=login');
    }
}
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon" style="background:var(--nx-green-subtle); color:var(--nx-green);"><i class="fa-solid fa-user-plus"></i></div>
            <h2>Kayıt Ol</h2>
            <p>NEXOS topluluğuna katılın.</p>
        </div>
        
        <form method="POST" action="index.php?page=register" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control" placeholder="arch_lover99" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@nexos.dev" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="form-group">
                <label class="form-label">Şifre (Tekrar)</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" name="register" class="btn-highlight w-full" style="justify-content:center; margin-top:var(--nx-sp-3);">
                <i class="fa-solid fa-rocket"></i> Hesap Oluştur
            </button>
        </form>
        
        <div class="nx-auth-footer">
            Zaten hesabınız var mı? <a href="index.php?page=login">Giriş Yapın</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
