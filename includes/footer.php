<?php
// includes/footer.php — NEXOS Premium Footer
?>
</main>

<footer class="nx-footer">
    <div class="container">
        <div class="nx-footer-grid">
            <!-- Brand Column -->
            <div class="nx-footer-col">
                <a href="index.php?page=home" class="nx-logo mb-4" style="display:inline-flex; margin-bottom:var(--nx-sp-5);">
                    <div class="nx-logo-icon"><i class="fa-brands fa-linux"></i></div>
                    <span class="nx-logo-text">NEXOS</span>
                </a>
                <p>"Talk is cheap. Show me the code." — Linus Torvalds</p>
                <p style="margin-top:var(--nx-sp-2);">Açık kaynak teknolojilerinin karmaşıklığını basitleştirerek, Linux deneyimini herkes için erişilebilir kılıyoruz.</p>
                <div class="nx-footer-social">
                    <a href="https://github.com/INEXX-max/linux-hub" target="_blank" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="#" aria-label="Discord"><i class="fa-brands fa-discord"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="nx-footer-col">
                <h4>Platform</h4>
                <ul>
                    <li><a href="index.php?page=what-is-linux">Linux Nedir?</a></li>
                    <li><a href="index.php?page=distros">Dağıtımlar</a></li>
                    <li><a href="index.php?page=architecture">Mimari</a></li>
                    <li><a href="index.php?page=history">Tarihçe</a></li>
                </ul>
            </div>
            
            <!-- More Links -->
            <div class="nx-footer-col">
                <h4>Keşfet</h4>
                <ul>
                    <li><a href="index.php?page=use_cases">Kullanım Alanları</a></li>
                    <li><a href="index.php?page=quiz">Dağıtım Testi</a></li>
                    <li><a href="index.php?page=register">Kayıt Ol</a></li>
                    <li><a href="index.php?page=dashboard">Kontrol Paneli</a></li>
                </ul>
            </div>
            
            <!-- Ecosystem -->
            <div class="nx-footer-col">
                <h4>Ekosistem</h4>
                <ul>
                    <li><a href="https://kernel.org" target="_blank">Linux Kernel</a></li>
                    <li><a href="https://ubuntu.com" target="_blank">Ubuntu</a></li>
                    <li><a href="https://archlinux.org" target="_blank">Arch Linux</a></li>
                    <li><a href="https://fedoraproject.org" target="_blank">Fedora</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom -->
        <div class="nx-footer-bottom">
            <p>&copy; <?= date("Y") ?> NEXOS — Özgür Yazılım İnsanı Özgür Kılar.</p>
            <p style="margin-top:var(--nx-sp-2);">
                Bir <a href="https://inexxinteractive.com" target="_blank">INEXX INTERACTIVE</a> ürünüdür.
            </p>
        </div>
    </div>
</footer>

<!-- NEXOS JavaScript Modules -->
<script src="assets/js/animations.js"></script>
<script src="assets/js/counters.js"></script>
<script src="assets/js/particles.js"></script>
<script src="assets/js/terminal.js"></script>
<script src="assets/js/slider.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
