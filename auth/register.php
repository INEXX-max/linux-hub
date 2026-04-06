<?php
// auth/register.php
require_once 'includes/header.php';

if(isLoggedIn()){
    redirect('index.php?page=dashboard');
}

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
        // DB Olmadığı İçin Kayıt işlemini direkt başarılı sayıyoruz.
        setFlashMessage('success', 'Hesabınız yerel bellekte oluşturuldu! Kaydettiğiniz rastgele e-posta ve şifreyle hemen giriş yapabilirsiniz.');
        redirect('index.php?page=login');
    }
}
?>

<div class="auth-wrapper container mt-5 mb-5" style="display:flex; justify-content:center; align-items:center;">
    <div class="auth-card card" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-4">
            <h2 class="text-accent"><i class="fa-solid fa-user-plus"></i> Kayıt Ol</h2>
            <p class="text-muted">Açık kaynak dünyasına katılın.</p>
        </div>
        
        <form method="POST" action="index.php?page=register">
            <div class="form-group">
                <label class="form-label">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control" placeholder="arch_lover99" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@linuxhub.local" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="form-group">
                <label class="form-label">Şifre (Tekrar)</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="••••••••" required>
            </div>
            
            <button type="submit" name="register" class="btn-highlight" style="width: 100%; display:flex; justify-content:center; margin-top:20px;">Hesap Oluştur</button>
        </form>
        
        <div class="text-center mt-4" style="font-size: 0.9rem;">
            Zaten hesabınız var mı? <a href="index.php?page=login">Giriş Yapın</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
