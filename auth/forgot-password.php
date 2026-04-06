<?php
// auth/forgot-password.php
require_once 'includes/header.php';

if(isLoggedIn()){
    redirect('index.php?page=dashboard');
}

$simulated_link = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])){
    $email = sanitizeInput($_POST['email']);
    
    // DB olmadığı için her e-postayı onaylayıp sahte link üretiyoruz
    $token = bin2hex(random_bytes(16));
    $simulated_link = "index.php?page=reset-password&token=" . $token;
    setFlashMessage('success', 'Şifre sıfırlama bağlantısı e-posta adresinize gönderildi! (Simülasyon Aktif)');
}
?>

<div class="auth-wrapper container mt-5 mb-5" style="display:flex; justify-content:center; align-items:center;">
    <div class="auth-card card" style="max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
            <h2 style="color: #ff9f43;"><i class="fa-solid fa-key"></i> Şifremi Unuttum</h2>
            <p class="text-muted">E-posta adresinizi girin ve şifre sıfırlama bağlantısı alın.</p>
        </div>
        
        <?php if(!empty($simulated_link)): ?>
            <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid var(--accent-color); padding: 15px; border-radius:8px; margin-bottom: 20px;">
                <strong style="color:var(--text-main)"><i class="fa-solid fa-envelope"></i> [SİMÜLASYON]</strong> Mail Kutunuza Gelen Link:<br><br>
                <a href="<?= $simulated_link ?>" style="word-break: break-all; color: var(--accent-color); text-decoration:underline;">Sıfırlama Bağlantısı'na Tıklayın</a>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=forgot-password">
            <div class="form-group">
                <label class="form-label">Kayıtlı E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="user@linuxhub.local" required>
            </div>
            
            <button type="submit" name="reset" class="btn-outline" style="width: 100%; border-color: #ff9f43; color: #ff9f43!important; margin-top:10px; display:flex; justify-content:center;">Sıfırlama Bağlantısı Gönder</button>
        </form>
        
        <div class="text-center mt-4" style="font-size: 0.9rem;">
            Hatırladınız mı? <a href="index.php?page=login">Giriş Yapın</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
