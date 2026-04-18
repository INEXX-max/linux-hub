<?php
// auth/forgot-password.php — Linux.devops Password Reset with SQLite

// Redirect ve header islemleri HTML ciktisinden ONCE yapilmali
if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

$showResetForm = false;
$resetEmail = '';

// Adim 1: Email girisi
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['find_account'])){
    $email = sanitizeInput($_POST['email']);
    if(emailExists($email)) {
        $showResetForm = true;
        $resetEmail = $email;
    } else {
        setFlashMessage('error', 'Bu e-posta adresi ile kayitli hesap bulunamadi.');
    }
}

// Adim 2: Yeni sifre belirleme
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset_password'])){
    $email = sanitizeInput($_POST['reset_email']);
    $newPass = $_POST['new_password'];
    $newPassConfirm = $_POST['new_password_confirm'];
    
    if(strlen($newPass) < 6) {
        setFlashMessage('error', 'Yeni sifre en az 6 karakter olmali.');
        $showResetForm = true;
        $resetEmail = $email;
    } elseif($newPass !== $newPassConfirm) {
        setFlashMessage('error', 'Sifreler eslesmiyor.');
        $showResetForm = true;
        $resetEmail = $email;
    } else {
        if(updatePassword($email, $newPass)) {
            setFlashMessage('success', 'Sifreniz basariyla guncellendi! Yeni sifrenizle giris yapabilirsiniz.');
            redirect('index.php?page=login');
        } else {
            setFlashMessage('error', 'Sifre guncellenirken bir hata olustu.');
        }
    }
}

require_once 'includes/header.php';
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon" style="background:var(--nx-amber-subtle); color:var(--nx-amber);"><i class="fa-solid fa-key"></i></div>
            <h2><?= $showResetForm ? 'Yeni Sifre Belirle' : 'Sifremi Unuttum' ?></h2>
            <p><?= $showResetForm ? 'Hesabiniz icin yeni bir sifre belirleyin.' : 'E-posta adresinizi girin.' ?></p>
        </div>

        <?php if($showResetForm): ?>
        <!-- Yeni sifre formu -->
        <form method="POST" action="index.php?page=forgot-password" class="nx-auth-form">
            <input type="hidden" name="reset_email" value="<?= htmlspecialchars($resetEmail) ?>">
            <div class="form-group">
                <label class="form-label">Yeni Sifre</label>
                <input type="password" name="new_password" class="form-control" placeholder="En az 6 karakter" required minlength="6">
            </div>
            <div class="form-group">
                <label class="form-label">Yeni Sifre (Tekrar)</label>
                <input type="password" name="new_password_confirm" class="form-control" placeholder="Sifrenizi tekrar girin" required>
            </div>
            <button type="submit" name="reset_password" class="btn-gradient w-full" style="justify-content:center;">
                <i class="fa-solid fa-check"></i> Sifreyi Guncelle
            </button>
        </form>
        <?php else: ?>
        <!-- Email bulma formu -->
        <form method="POST" action="index.php?page=forgot-password" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">Kayitli E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@email.com" required>
            </div>
            <button type="submit" name="find_account" class="btn-outline w-full" style="justify-content:center; border-color:var(--nx-amber); color:var(--nx-amber)!important; margin-top:var(--nx-sp-3);">
                <i class="fa-solid fa-magnifying-glass"></i> Hesabi Bul
            </button>
        </form>
        <?php endif; ?>
        
        <div class="nx-auth-footer">
            <a href="index.php?page=login">Giris Sayfasina Don</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
