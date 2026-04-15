<?php
// includes/footer.php — NEXOS Footer with INEXX INTERACTIVE branding
?>
</main>

<footer class="nx-footer">
    <div class="container">
        <div class="nx-footer-grid">
            <!-- Brand -->
            <div class="nx-footer-col">
                <div class="nx-footer-brand">
                    <span class="nx-logo-icon" style="font-size:1.2rem;"><i class="fa-solid fa-terminal"></i></span>
                    <span style="font-weight:700; font-size:var(--nx-fs-lg);">NEXOS</span>
                </div>
                <p class="text-muted" style="font-size:var(--nx-fs-sm); line-height:1.7; margin-top:var(--nx-sp-3);">
                    Acik kaynak teknolojilerinin gucunu kesfedin. INEXX INTERACTIVE tarafindan gelistirilmektedir.
                </p>
            </div>

            <!-- Platform -->
            <div class="nx-footer-col">
                <h4>Platform</h4>
                <ul>
                    <li><a href="index.php?page=what-is-linux">Linux Nedir?</a></li>
                    <li><a href="index.php?page=architecture">Mimari</a></li>
                    <li><a href="index.php?page=history">Tarihce</a></li>
                    <li><a href="index.php?page=use_cases">Kullanim Alanlari</a></li>
                </ul>
            </div>

            <!-- Araclar -->
            <div class="nx-footer-col">
                <h4>Araclar</h4>
                <ul>
                    <li><a href="index.php?page=distros">Dagitim Katalogu</a></li>
                    <li><a href="index.php?page=quiz">Dagitim Testi</a></li>
                    <li><a href="index.php?page=dashboard">Kontrol Paneli</a></li>
                </ul>
            </div>

            <!-- Gelistirici -->
            <div class="nx-footer-col">
                <h4>Gelistirici</h4>
                <ul>
                    <li><a href="https://github.com/INEXX-max/linux-hub" target="_blank"><i class="fa-brands fa-github"></i> GitHub</a></li>
                </ul>
                <div style="margin-top:var(--nx-sp-5); padding:var(--nx-sp-4); background:var(--nx-surface); border-radius:var(--nx-radius-sm); border:1px solid var(--nx-border);">
                    <div style="font-size:var(--nx-fs-xs); color:var(--nx-text-muted);">Gelistiren</div>
                    <div style="font-weight:700; color:var(--nx-blue); font-size:var(--nx-fs-sm); margin-top:2px;">INEXX INTERACTIVE</div>
                </div>
            </div>
        </div>

        <!-- Bottom -->
        <div class="nx-footer-bottom">
            <p>&copy; <?= date("Y") ?> NEXOS — INEXX INTERACTIVE tarafindan gelistirilmektedir.</p>
        </div>
    </div>
</footer>

<!-- JS Modules -->
<script src="assets/js/main.js"></script>
<script src="assets/js/animations.js"></script>
<script src="assets/js/counters.js"></script>
<script src="assets/js/terminal.js"></script>
<script src="assets/js/slider.js"></script>

</body>
</html>
