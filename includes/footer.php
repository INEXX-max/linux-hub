<?php
// includes/footer.php — NEXOS Footer
?>
</main>

<footer class="nx-footer">
    <div class="container">
        <div class="nx-footer-grid">
            <div class="nx-footer-col">
                <div class="nx-footer-brand">
                    <span class="nx-logo-icon" style="font-size:1rem;"><i class="fa-solid fa-terminal"></i></span>
                    <span style="font-weight:800; font-size:var(--nx-fs-lg); letter-spacing:-0.02em;">NEXOS</span>
                </div>
                <p style="font-size:var(--nx-fs-sm); color:var(--nx-text-dim); line-height:1.7; margin-top:var(--nx-sp-4); max-width:280px;">
                    Linux destekli isletim sistemi platformu. Dagitim kesfi, interaktif terminal ve topluluk araclari.
                </p>
            </div>
            <div class="nx-footer-col">
                <h4>Platform</h4>
                <ul>
                    <li><a href="index.php?page=what-is-linux">Linux Nedir?</a></li>
                    <li><a href="index.php?page=architecture">Mimari</a></li>
                    <li><a href="index.php?page=history">Tarihce</a></li>
                    <li><a href="index.php?page=use_cases">Kullanim Alanlari</a></li>
                </ul>
            </div>
            <div class="nx-footer-col">
                <h4>Araclar</h4>
                <ul>
                    <li><a href="index.php?page=distros">Dagitim Katalogu</a></li>
                    <li><a href="index.php?page=quiz">Dagitim Testi</a></li>
                    <li><a href="index.php?page=dashboard">Kontrol Paneli</a></li>
                </ul>
            </div>
            <div class="nx-footer-col">
                <h4>Sirket</h4>
                <ul>
                    <li><a href="https://inexxinteractive.com" target="_blank">Ana Sayfa</a></li>
                    <li><a href="https://github.com/INEXX-max/linux-hub" target="_blank"><i class="fa-brands fa-github"></i> GitHub</a></li>
                </ul>
            </div>
        </div>
        <div class="nx-footer-bottom">
            <p>&copy; <?= date("Y") ?> <a href="https://inexxinteractive.com" target="_blank" style="color:var(--nx-blue); font-weight:700;">INEXX INTERACTIVE</a>. All Rights Reserved.</p>
            <p style="margin-top:6px; font-size:0.65rem; color:var(--nx-text-dim); letter-spacing:2px; text-transform:uppercase;">This product <a href="https://inexxinteractive.com" target="_blank" style="color:var(--nx-text-muted); text-decoration:none;">INEXX INTERACTIVE</a></p>
        </div>
    </div>
</footer>

<script src="assets/js/main.js"></script>
<script src="assets/js/animations.js"></script>
<script src="assets/js/counters.js"></script>
<script src="assets/js/terminal.js"></script>
<script src="assets/js/slider.js"></script>
</body>
</html>