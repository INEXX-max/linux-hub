<?php
// auth/forgot-password.php — NEXOS Password Reset
require_once 'includes/header.php';

if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

$simulated_link = "";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])){
    $email = sanitizeInput($_POST['email']);
    $token = bin2hex(random_bytes(16));
    $simulated_link = "index.php?page=reset-password&token=" . $token;
    setFlashMessage('success', 'Şifre sıfırlama bağlantısı gönderildi! (Simülasyon)');
}
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon" style="background:var(--nx-amber-subtle); color:var(--nx-amber);"><i class="fa-solid fa-key"></i></div>
            <h2>Şifremi Unuttum</h2>
            <p>E-posta adresinizi girin ve sıfırlama bağlantısı alın.</p>
        </div>
        
        <?php if(!empty($simulated_link)): ?>
        <div class="nx-alert nx-alert-green mb-6">
            <strong><i class="fa-solid fa-envelope"></i> [SİMÜLASYON]</strong> Mail Kutunuza Gelen Link:<br><br>
            <a href="<?= $simulated_link ?>" style="word-break:break-all; color:var(--nx-green); text-decoration:underline;">Sıfırlama Bağlantısına Tıklayın</a>
        </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=forgot-password" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">Kayıtlı E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@nexos.dev" required>
            </div>
            <button type="submit" name="reset" class="btn-outline w-full" style="justify-content:center; border-color:var(--nx-amber); color:var(--nx-amber)!important; margin-top:var(--nx-sp-3);">
                <i class="fa-solid fa-paper-plane"></i> Sıfırlama Bağlantısı Gönder
            </button>
        </form>
        
        <div class="nx-auth-footer">
            Hatırladınız mı? <a href="index.php?page=login">Giriş Yapın</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
