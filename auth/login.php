<?php
// auth/login.php
require_once 'includes/header.php';

if(isLoggedIn()){
    redirect('index.php?page=dashboard');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        setFlashMessage('error', 'Lütfen tüm alanları doldurun.');
    } else {
        // DB olmadığı için giriş yapan herkesi kabul edip oturum açan simülasyon mantığı
        if(strlen($password) >= 6) { // basit demo kontolü
            $_SESSION['user_id'] = mt_rand(100, 9999);
            // Email içinden isim çıkararak isim verelim
            $_SESSION['username'] = explode('@', $email)[0];
            $_SESSION['role'] = 'user';
            
            setFlashMessage('success', 'Tebrikler. Cihaz hafızasında geçici olarak giriş yapıldı!');
            redirect('index.php?page=dashboard');
        } else {
            setFlashMessage('error', 'Şifre çok kısa. Giriş için en az 6 karakter girmeniz yeterli (Demo mod).');
        }
    }
}
?>

<div class="auth-wrapper container mt-5 mb-5" style="display:flex; justify-content:center; align-items:center;">
    <div class="auth-card card" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-4">
            <h2 class="text-primary"><i class="fa-solid fa-terminal"></i> Sisteme Giriş</h2>
            <p class="text-muted">Erişim bilgilerinizi doğrulayın.</p>
        </div>
        
        <form method="POST" action="index.php?page=login">
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@linuxhub.local" required>
            </div>
            <div class="form-group">
                <label class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 25px;">
                <label style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:var(--text-muted); cursor:pointer;">
                    <input type="checkbox" name="remember" style="accent-color: var(--primary-color);"> Beni Hatırla
                </label>
                <a href="index.php?page=forgot-password" style="font-size: 0.9rem;">Şifremi Unuttum</a>
            </div>
            
            <button type="submit" name="login" class="btn-primary" style="width: 100%; display:block;">Giriş Yap</button>
        </form>
        
        <div class="text-center mt-4" style="font-size: 0.9rem;">
            Hesabınız yok mu? <a href="index.php?page=register">Hemen Kayıt Olun</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
