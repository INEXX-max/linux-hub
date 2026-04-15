<?php
// pages/what-is-linux.php — NEXOS Modern Content Page
require_once 'includes/header.php';
require_once 'includes/section-title.php';
?>

<!-- Hero Banner -->
<section class="nx-section" style="padding-top:var(--nx-sp-20);">
    <div class="container" style="max-width:800px;">
        <div class="text-center reveal">
            <div class="nx-label" style="display:inline-flex; align-items:center; gap:8px; padding:6px 18px; background:var(--nx-blue-subtle); color:var(--nx-blue); border-radius:var(--nx-radius-full); font-size:var(--nx-fs-xs); font-weight:700; text-transform:uppercase; letter-spacing:1px; border:1px solid rgba(79,143,255,0.2);">
                <i class="fa-solid fa-book-open"></i> Rehber
            </div>
            <h1 style="font-size:var(--nx-fs-hero); font-weight:800; margin-top:var(--nx-sp-5); line-height:1.1;">
                Linux <span class="nx-text-gradient">Nedir?</span>
            </h1>
            <p class="text-muted" style="font-size:var(--nx-fs-lg); max-width:600px; margin:var(--nx-sp-5) auto 0; line-height:1.7;">
                Dunyayi sessizce calistiran acik kaynakli isletim sistemi cekirdegi ve onun etrafinda insa edilen ekosistem.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="nx-section-sm">
    <div class="container" style="max-width:760px;">
        <div class="nx-article reveal">
            <h2 style="color:var(--nx-blue);">Cekirdek: Her Seyin Temeli</h2>
            <p>Linux, 1991 yilinda Linus Torvalds tarafindan gelistirilen isletim sistemi cekirdegi (kernel). Cekirdek, donanim ile yazilim arasindaki koprudur — islemci, bellek, disk, ag gibi tum donanim kaynaklarini yonetir. Bir isletim sistemi gorsellestirmek gerekirse:</p>
            
            <div class="nx-card" style="padding:var(--nx-sp-8); margin:var(--nx-sp-8) 0; background:var(--nx-surface); border:1px solid var(--nx-border);">
                <div style="font-family:var(--nx-font-mono); font-size:var(--nx-fs-sm); color:var(--nx-text-soft); line-height:2;">
                    <div style="color:var(--nx-text-dim);">// Isletim Sistemi Katmanlari</div>
                    <div><span style="color:var(--nx-blue);">Uygulamalar</span> → Web tarayici, terminal, editör</div>
                    <div><span style="color:var(--nx-cyan);">Shell</span> → Kullanicinin komut verdigi katman</div>
                    <div><span style="color:var(--nx-green);">Kernel</span> → Donanimi yoneten cekirdek</div>
                    <div><span style="color:var(--nx-amber);">Donanim</span> → CPU, RAM, Disk, GPU</div>
                </div>
            </div>

            <h2 style="color:var(--nx-cyan);">Dagitim (Distribution) Nedir?</h2>
            <p>Linux cekirdegi tek basina bir isletim sistemi degildir. Cekirdek + GNU araclari + paket yoneticisi + masaustu ortami = <strong>dagitim</strong>. Her dagitim farkli bir amaca yonelik paketlenistir:</p>
            
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--nx-sp-4); margin:var(--nx-sp-6) 0;">
                <div class="nx-card" style="padding:var(--nx-sp-5); border-left:3px solid var(--nx-green);">
                    <strong style="color:var(--nx-green);">Ubuntu</strong>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm); margin:var(--nx-sp-2) 0 0;">Yeni baslayanlar icin ideal, genis topluluk</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-5); border-left:3px solid var(--nx-red);">
                    <strong style="color:var(--nx-red);">Arch Linux</strong>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm); margin:var(--nx-sp-2) 0 0;">Tam kontrol, minimalist, rolling release</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-5); border-left:3px solid var(--nx-amber);">
                    <strong style="color:var(--nx-amber);">Kali Linux</strong>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm); margin:var(--nx-sp-2) 0 0;">Siber guvenlik ve penetrasyon testleri</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-5); border-left:3px solid var(--nx-blue);">
                    <strong style="color:var(--nx-blue);">Fedora</strong>
                    <p class="text-muted" style="font-size:var(--nx-fs-sm); margin:var(--nx-sp-2) 0 0;">Yenilikci, acik kaynak felsefesi</p>
                </div>
            </div>

            <h2 style="color:var(--nx-green);">Neden Linux?</h2>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--nx-sp-4); margin:var(--nx-sp-6) 0;">
                <div class="nx-card" style="padding:var(--nx-sp-6); text-align:center;">
                    <i class="fa-solid fa-lock" style="font-size:1.5rem; color:var(--nx-green); margin-bottom:var(--nx-sp-3);"></i>
                    <h4 style="font-size:var(--nx-fs-base);">Guvenlik</h4>
                    <p class="text-muted" style="font-size:var(--nx-fs-xs);">Izin sistemi, acik kaynak denetimi, minimal saldiri yuzeyi</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-6); text-align:center;">
                    <i class="fa-solid fa-gauge-high" style="font-size:1.5rem; color:var(--nx-blue); margin-bottom:var(--nx-sp-3);"></i>
                    <h4 style="font-size:var(--nx-fs-base);">Performans</h4>
                    <p class="text-muted" style="font-size:var(--nx-fs-xs);">Dusuk kaynak tuketimi, eski donanimlarda bile hizli</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-6); text-align:center;">
                    <i class="fa-solid fa-palette" style="font-size:1.5rem; color:var(--nx-purple); margin-bottom:var(--nx-sp-3);"></i>
                    <h4 style="font-size:var(--nx-fs-base);">Ozellestirme</h4>
                    <p class="text-muted" style="font-size:var(--nx-fs-xs);">Masaustunden cekirdeğe kadar her sey degisltirilebilir</p>
                </div>
                <div class="nx-card" style="padding:var(--nx-sp-6); text-align:center;">
                    <i class="fa-solid fa-users" style="font-size:1.5rem; color:var(--nx-cyan); margin-bottom:var(--nx-sp-3);"></i>
                    <h4 style="font-size:var(--nx-fs-base);">Topluluk</h4>
                    <p class="text-muted" style="font-size:var(--nx-fs-xs);">Milyonlarca gelistirici, 20.000+ katkilci</p>
                </div>
            </div>

            <h2 style="color:var(--nx-purple);">Acik Kaynak Felsefesi</h2>
            <p>Linux'un kaynak kodu herkese aciktir. Bu, herkesin kodu inceleyip, katkida bulunup, kendi versiyonunu olusturabillecegi anlamina gelir. GPL lisansi altinda dagitilan Linux, "ozgur yazilim" hareketinin en buyuk basari hikayesidir.</p>
            
            <div class="nx-alert nx-alert-green" style="margin-top:var(--nx-sp-6);">
                <strong><i class="fa-solid fa-quote-left"></i> "Talk is cheap. Show me the code."</strong>
                <p style="margin:var(--nx-sp-2) 0 0; color:var(--nx-text-muted); font-size:var(--nx-fs-sm);">— Linus Torvalds, Linux Cekirdeğinin Yaraticisi</p>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-10 reveal">
            <a href="index.php?page=distros" class="btn-gradient btn-lg"><i class="fa-solid fa-th-large"></i> Dagitimlari Kesfet</a>
            <a href="index.php?page=quiz" class="btn-outline btn-lg" style="margin-left:var(--nx-sp-4);"><i class="fa-solid fa-wand-magic-sparkles"></i> Quiz</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
