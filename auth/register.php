<?php
// auth/register.php — Linux.devops Real Registration with SQLite

// Redirect ve header islemleri HTML ciktisinden ONCE yapilmali
if(isLoggedIn()) { redirect('index.php?page=dashboard'); }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    if(empty($username) || empty($email) || empty($password)){
        setFlashMessage('error', 'Tum alanlari doldurun.');
    } elseif(strlen($username) < 3) {
        setFlashMessage('error', 'Kullanici adi en az 3 karakter olmali.');
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setFlashMessage('error', 'Gecerli bir e-posta adresi girin.');
    } elseif($password !== $password_confirm) {
        setFlashMessage('error', 'Sifreler eslesmiyor!');
    } elseif(strlen($password) < 6) {
        setFlashMessage('error', 'Sifre en az 6 karakter olmali.');
    } elseif(emailExists($email)) {
        setFlashMessage('error', 'Bu e-posta zaten kayitli.');
    } elseif(usernameExists($username)) {
        setFlashMessage('error', 'Bu kullanici adi alinmis.');
    } else {
        try {
            registerUser($username, $email, $password);
            setFlashMessage('success', 'Hesabiniz basariyla olusturuldu! Giris yapabilirsiniz.');
            redirect('index.php?page=login');
        } catch(Exception $e) {
            setFlashMessage('error', 'Kayit sirasinda bir hata olustu.');
        }
    }
}

require_once 'includes/header.php';
?>

<div class="nx-auth-wrapper">
    <div class="nx-auth-card">
        <div class="nx-auth-header">
            <div class="nx-auth-icon" style="background:var(--nx-green-subtle); color:var(--nx-green);"><i class="fa-solid fa-user-plus"></i></div>
            <h2>Kayit Ol</h2>
            <p>Topluluga katilin, Linux'u kesfedin.</p>
        </div>
        
        <form method="POST" action="index.php?page=register" class="nx-auth-form">
            <div class="form-group">
                <label class="form-label">Kullanici Adi</label>
                <input type="text" name="username" class="form-control" placeholder="arch_lover99" required autocomplete="off" minlength="3">
            </div>
            <div class="form-group">
                <label class="form-label">E-posta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="kullanici@email.com" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Sifre</label>
                <input type="password" name="password" class="form-control" placeholder="En az 6 karakter" required minlength="6">
            </div>
            <div class="form-group">
                <label class="form-label">Sifre (Tekrar)</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="Sifrenizi tekrar girin" required>
            </div>
            <button type="submit" name="register" class="btn-highlight w-full" style="justify-content:center; margin-top:var(--nx-sp-3);">
                <i class="fa-solid fa-rocket"></i> Hesap Olustur
            </button>
        </form>
        
        <div class="nx-auth-footer">
            Zaten hesabiniz var mi? <a href="index.php?page=login">Giris Yapin</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
