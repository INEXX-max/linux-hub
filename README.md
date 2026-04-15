<p align="center">
  <img src="https://img.shields.io/badge/NEXOS-Linux%20Platform-0a0e1a?style=for-the-badge&labelColor=0a0e1a&color=4f8fff" alt="NEXOS" />
</p>

<h1 align="center">NEXOS — Linux Bilgi ve Topluluk Platformu</h1>

<p align="center">
  <strong>PHP tabanli, veritabani bagimsiz, modern ve interaktif bir Linux tanitim platformu.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS3-Modular%20Design%20System-1572B6?style=flat-square&logo=css3&logoColor=white" />
  <img src="https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=flat-square&logo=javascript&logoColor=black" />
  <img src="https://img.shields.io/badge/Docker-Containerized-2496ED?style=flat-square&logo=docker&logoColor=white" />
  <img src="https://img.shields.io/badge/Deploy-Render.com-46E3B7?style=flat-square&logo=render&logoColor=white" />
</p>

<br/>

<p align="center">
  <code>Gelistirici: Muhammed Inanc</code>
</p>

---

## Icindekiler

- [Projenin Amaci](#projenin-amaci)
- [Neler Yapildi](#neler-yapildi)
- [Teknik Mimari](#teknik-mimari)
- [Tasarim Sistemi](#tasarim-sistemi)
- [Sayfa Bazli Detaylar](#sayfa-bazli-detaylar)
- [Interaktif Bilesenler](#interaktif-bilesenler)
- [Klasor Yapisi](#klasor-yapisi)
- [Kullanilan Teknolojiler](#kullanilan-teknolojiler)
- [Kurulum ve Calistirma](#kurulum-ve-calistirma)

---

## Projenin Amaci

Bu proje, Linux isletim sistemi hakkinda kapsamli bilgi sunan, kullanicilarin dagitim secimi yapmasina yardimci olan ve interaktif ogrenme deneyimi saglayan bir web platformudur.

Proje siradan bir bilgi sitesi olarak degil, **profesyonel bir teknoloji markasi** hissiyatiyla tasarlanmistir. Koyu tema, neon vurgular, cam efektleri (glassmorphism), scroll animasyonlari ve interaktif terminal simulasyonu gibi modern web teknikleri kullanilarak, kullaniciya **gelecek nesil bir isletim sistemi deneyimi** sunulmustur.

Platform, herhangi bir veritabani gerektirmeden tamamen PHP oturum yonetimi ve statik veri dizileri uzerinde calisir. Bu sayede kurulum karmasikligi ortadan kaldirilmis, proje herhangi bir ortamda (Docker, yerel sunucu, bulut) kolayca calistirilabilir hale getirilmistir.

---

## Neler Yapildi

### Tasarim Katmani (Frontend)

Projenin gorsel katmani sifirdan, moduler bir CSS tasarim sistemi uzerine insa edilmistir. Tek bir monolitik CSS dosyasi yerine, sorumluluk alanina gore ayrilmis 12 bagimsiz CSS modulu olusturulmustur:

| Modul | Sorumluluk |
|-------|-----------|
| `variables.css` | 100'den fazla CSS degiskeni: renk paleti, tipografi olcekleri, golge tanimlari, gecis efektleri, gradient sablonlari, z-index katmanlari |
| `base.css` | Global sifirlama (reset), tipografi temeli, scrollbar stillendirmesi, metin secim rengi, kod bloklari |
| `layout.css` | Container sistemi, 2/3/4 kolonlu grid, flex yardimcilari, bosluk (spacing) siniflari, responsive kirilma noktalari |
| `components.css` | Navbar, 6 farkli buton varyanti, 4 farkli kart tipi, formlar, ilerleme cubugu, uyari kutulari, terminal penceresi, footer |
| `animations.css` | Scroll reveal animasyonlari, kayma (float) efektleri, parlama (glow) animasyonlari, gradient hareketi, grid/nokta arka plan desenleri |
| `pages/home.css` | Ana sayfa hero bolumu, istatistik cubugu, kullanim alanlari, sirket logolari, masaustu sekmeleri |
| `pages/content.css` | Makale yerlesimi, mimari katman yigini, senaryo kartlari, quiz radyo kartlari |
| `pages/distros.css` | Dagitim kart izgarasi, arama kutusu, puan cubuklari, teknik kimlik karti |
| `pages/history.css` | Zaman cizelgesi, animasyonlu noktalar, alternan kart yapisi |
| `pages/auth.css` | Ortalanmis giris karti, gradient kenarlik efekti |
| `pages/dashboard.css` | Yan menu, karsilama banneri, istatistik kartlari |
| `style.css` | Tum modulleri birlestiren ana import dosyasi |

### JavaScript Modulleri

Site etkilesimini saglayan 6 bagimsiz JavaScript modulu yazilmistir:

| Modul | Islev |
|-------|-------|
| `animations.js` | IntersectionObserver tabanli scroll reveal sistemi, stagger (kademeli gecikme) destegi, fare takip efekti, navbar kaydirma algilama |
| `counters.js` | requestAnimationFrame ile sayac animasyonu, cubic ease-out gecisi, IntersectionObserver ile tetikleme |
| `terminal.js` | 15'ten fazla komut destekleyen interaktif terminal simulasyonu, komut gecmisi (ok tuslari), karsilama animasyonu |
| `slider.js` | Masaustu ortami sekme degistirici |
| `particles.js` | CSS tabanli arka plan efektleri (performans odakli, canvas kullanilmaz) |
| `main.js` | Mobil menu, flash mesaj yonetimi, aktif navigasyon vurgulama, puan cubugu animasyonu |

### Sunucu Katmani (Backend — PHP)

PHP tarafinda mevcut is mantigi tamamen korunmus, yalnizca HTML sablon katmani modernize edilmistir:

- **Router** (`index.php`): Beyaz liste (whitelist) tabanli guvenli sayfa yonlendirmesi
- **Veri Kaynagi** (`config/data.php`): 10 Linux dagitiminin tum teknik verilerini iceren statik PHP dizisi
- **Fonksiyonlar** (`includes/functions.php`): Oturum yonetimi, XSS korumasi (`sanitizeInput`), flash mesaj sistemi, yetkilendirme kontrolu
- **Kimlik Dogrulama**: Oturum tabanli giris/kayit simulasyonu (veritabani gerektirmez)
- **Quiz Motoru**: Cok adimli form, agirlikli puanlama algoritmasi, en uygun 3 dagitimi oneren sirali sonuc

### Yeniden Kullanilabilir Bilesenler

Kod tekrarini onlemek ve bakim kolayligi saglamak icin 5 yeniden kullanilabilir PHP bilesen olusturulmustur:

| Bilesen | Aciklama |
|---------|---------|
| `section-title.php` | Her sayfada kullanilan standart bolum basligi fonksiyonu (etiket + baslik + alt baslik) |
| `hero-linux-ui.php` | Saf CSS/HTML ile olusturulmus Linux masaustu mockup'i: GNOME ust cubugu, terminal penceresi, sistem izleyici, dosya yoneticisi, dock |
| `terminal-widget.php` | Kullanicinin komut yazabilecegi interaktif terminal alani |
| `desktop-preview-tabs.php` | 5 masaustu ortaminin (GNOME, KDE, XFCE, Cinnamon, i3) sekmeli onizleme bilesen |

---

## Teknik Mimari

```
Kullanici Istegi
      |
      v
  index.php (Router)
      |
      |--- config/data.php (Statik Veri)
      |--- includes/functions.php (Cekirdek Fonksiyonlar)
      |
      v
  Sayfa Dosyasi (pages/*.php | auth/*.php | user/*.php)
      |
      |--- includes/header.php ---> assets/css/style.css (12 CSS modulu)
      |--- includes/navbar.php
      |--- [Sayfa Icerigi]
      |--- includes/footer.php ---> assets/js/*.js (6 JS modulu)
```

### Veri Akisi

1. Kullanici `index.php?page=distros` adresine istek gonderir
2. Router, `page` parametresini beyaz listeyle karsilastirir
3. Eslesme varsa ilgili PHP dosyasini yukler
4. Sayfa dosyasi `header.php` ile HTML basligini, `navbar.php` ile navigasyonu icerir
5. `config/data.php` icindeki statik dizilerden veri cekilir
6. Sayfa icerigi NEXOS CSS siniflariyla render edilir
7. `footer.php` ile footer ve JavaScript modulleri yuklenir

### Guvenlik Onlemleri

| Onlem | Uygulama |
|-------|---------|
| XSS Korumasi | Tum kullanici girdileri `htmlspecialchars()` ve `strip_tags()` ile temizlenir |
| Beyaz Liste Yonlendirme | Yalnizca `$allowed_pages` dizisinde tanimli sayfalar yuklenebilir |
| Oturum Guvenligi | `session_status()` kontrolu ile cift oturum baslatma engellenir |
| CSRF Korumasi | Form islemleri `$_SERVER['REQUEST_METHOD']` kontroluyle dogrulanir |

---

## Tasarim Sistemi

### Renk Paleti

| Degisken | Renk | Kullanim |
|----------|------|---------|
| `--nx-black` | `#06080d` | Ana arka plan |
| `--nx-dark` | `#0a0e1a` | Bolum arka plani |
| `--nx-surface` | `#111827` | Kart yuzeyi |
| `--nx-blue` | `#4f8fff` | Birincil vurgu rengi |
| `--nx-cyan` | `#22d3ee` | Ikincil vurgu |
| `--nx-purple` | `#8b5cf6` | Ucuncul vurgu |
| `--nx-green` | `#10b981` | Basari durumu |
| `--nx-amber` | `#f59e0b` | Uyari durumu |
| `--nx-red` | `#ef4444` | Hata durumu |

### Tipografi

- **Basliklar**: Inter (700/800 agirlik), `clamp()` ile responsive olcekleme
- **Govde Metni**: Inter (300/400 agirlik), 1.7 satir yuksekligi
- **Terminal / Kod**: JetBrains Mono, monospace yedek zinciri

### Gorsel Efektler

| Efekt | Teknik |
|-------|--------|
| Glassmorphism | `backdrop-filter: blur(20px)` ile yari saydam yuzeyler |
| Glow Border | CSS `::before` pseudo-element ile gradient kenarlik, hover'da gorunur |
| Scroll Reveal | IntersectionObserver API, `translateY(30px)` baslangic, 0.7s gecis |
| Float Animasyon | `@keyframes float` ile dikey sallanma, 4-6s sonsuz dongu |
| Count-Up | `requestAnimationFrame` ile cubic ease-out sayac |
| Grid Arka Plan | CSS `background-image` ile ince cizgi deseni, `mask-image` ile radyal solma |
| Mouse Glow | Fare pozisyonunu takip eden radyal gradient, `requestAnimationFrame` ile optimize |

### Responsive Tasarim

| Kirilma Noktasi | Davranis |
|----------------|---------|
| 1200px | 4 kolonlu grid 3'e duser |
| 992px | 3 kolonlu grid 2'ye duser, mobil menu aktif olur, sidebar gizlenir |
| 768px | Tum gridler tek kolona doner, timeline dikey moda gecer |
| 480px | Butonlar tam genislige gecer, istatistik cubugu 2x2 olur |

---

## Sayfa Bazli Detaylar

### Ana Sayfa (`pages/home.php`)

11 ayri bolumlden olusan, tam bir landing page deneyimi:

1. **Hero Bolumu**: Tam ekran, sol tarafta baslik ve aksiyon butonlari, sag tarafta CSS/HTML ile olusturulmus Linux masaustu mockup'i (GNOME tarzi pencereler: terminal + neofetch ciktisi, sistem izleyici, dosya yoneticisi, dock)
2. **Istatistik Cubugu**: 4 metrik (sunucu payi %96, super bilgisayar %100, Android 3M+, katkilci 20K+), IntersectionObserver ile tetiklenen sayac animasyonu
3. **Kullanim Alanlari**: 9 kartlik grid (sunucu, siber guvenlik, yazilim gelistirme, bulut, gomulu sistem, super bilgisayar, kurumsal, egitim, DevOps)
4. **Sirket Logolari**: 10 kurulus (Google, Amazon, Meta, NASA, CERN, IBM, Intel, Oracle, Red Hat, Tesla) ile hover'da bilgi tooltip
5. **Dagitim Onizleme**: Ilk 6 dagitiminla kart grid'i ve "Tumunu Gor" yonlendirmesi
6. **Masaustu Ortamlari**: 5 sekmeli (GNOME, KDE, XFCE, Cinnamon, i3) interaktif onizleme, her sekme icin CSS mockup ve ozellik listesi
7. **Tarihce Onizleme**: 3 donemlik mini timeline (1991, 2004, 2024+)
8. **Guvenlik ve Performans**: 4 infografik kart (izin sistemi, dusuk kaynak, ozellestirme, paket yonetimi)
9. **Terminal Deneyimi**: Kullanicinin Linux komutlari yazabilecegi interaktif terminal simulasyonu
10. **Ogrenme ve Topluluk**: 3 kartlik yonlendirme alani (Quiz, Linux Nedir, Mimari)
11. **CTA Banner**: Gradient arka planli kayit yonlendirmesi

### Dagitim Katalogu (`pages/distros_list.php`)

- Tum dagitimlar alfabetik sirada listelenir
- Glow-border kart yapisi ile hover efekti
- Canli arama filtresi (JavaScript ile anlik filtreleme)
- Zorluk seviyesi renk kodlu badge'ler (yesil/sari/kirmizi)
- Her kart: ad, aciklama, taban, masaustu ortami ve detay linki

### Dagitim Detay (`pages/distro_detail.php`)

- 2 kolonlu yerlesim: sol tarafta icerik, sag tarafta teknik kimlik karti
- 6 kategoride animasyonlu puan cubuklari (yeni baslayan, gelistirici, oyun, sunucu, eski donanim, guvenlik)
- Puan degerine gore otomatik baglamsal uyarilar
- Favori ekleme ozelligi (oturum tabanli)
- Sticky sidebar ile teknik ozellikler (taban, paket yoneticisi, masaustu, RAM tuketimi)

### Quiz (`pages/quiz.php`)

- 3 adimli form: amac, deneyim seviyesi, donanim gucu
- Gorsel ilerleme cubugu (aktif/tamamlanmis durumlar)
- Radyo kart secimi (ikon + baslik + aciklama)
- Agirlikli puanlama algoritmasi ile en uygun 3 dagitimin hesaplanmasi
- Yukleme animasyonu ve sonuc sayfasi (sampiyon vurgusu)
- Oturum aciksa sonuc kaydi

### Diger Sayfalar

| Sayfa | Ozellikler |
|-------|-----------|
| `what-is-linux.php` | Makale yerlesimi, sticky sidebar navigasyonu, avantaj kartlari |
| `history.php` | Alternan (sol-sag) zaman cizelgesi, renk kodlu donemler, animasyonlu noktalar |
| `architecture.php` | Interaktif mimari katman yigini, 6 bilesen karti, guvenilirlik maddeleri |
| `use_cases.php` | 5 senaryo karti (gelistirme, oyun, guvenlik, sunucu, eski donanim), CTA banneri |
| `login.php` | Ortalanmis cam kart, gradient kenarlik, "beni hatirla" secenegi |
| `register.php` | 4 alanli kayit formu, sifre esleme kontrolu |
| `forgot-password.php` | Sifre sifirlama simulasyonu, token uretimi |
| `dashboard.php` | Yan menu, karsilama banneri, 3 istatistik karti, favori grid'i, quiz sonucu, onerilen icerikler |

---

## Interaktif Bilesenler

### Terminal Simulasyonu

Kullanici, sayfadaki terminal alanina Linux komutlari yazabilir ve simulasyon cevaplari alabilir:

```
Desteklenen Komutlar:
  ls            Dizin icerigini listeler
  pwd           Calisma dizinini gosterir
  whoami        Kullanici adini gosterir
  neofetch      Sistem bilgilerini gosterir (ASCII sanat ile)
  uname -a      Kernel bilgisi
  date          Tarih ve saat
  uptime        Sistem calisma suresi
  echo [metin]  Metin ciktisi
  apt install   Paket kurulum simulasyonu
  sudo su       Root gecis simulasyonu
  clear         Ekrani temizle
  history       Komut gecmisi
  cat /etc/os-release   Sistem kimlik bilgisi
  help          Yardim mesaji
```

Ek ozellikler:
- Ok tuslari ile komut gecmisinde gezme
- Otomatik karsilama mesaji
- Animasyonlu satir ciktisi

### Masaustu Ortami Onizleme

5 farkli Linux masaustu ortamini sekmeli yapiyla gosteren interaktif bilesen:

| Ortam | Aciklama |
|-------|---------|
| GNOME | Modern, sade, uretkenlik odakli. Ubuntu ve Fedora varsayilani |
| KDE Plasma | Son derece ozellestirilebilir. Windows'a en yakin deneyim |
| XFCE | Ultra hafif, eski donanimlar icin mukemmel |
| Cinnamon | Linux Mint ile gelen, Windows kullanicilarina tanidik ortam |
| i3 / Tiling | Klavye odakli, sifir kaynak israfi |

Her sekme icin: CSS ile olusturulmus monitor mockup'i, terminal onizlemesi, ozellik listesi.

---

## Klasor Yapisi

```
nexos-platform/
|
|-- index.php                          # Ana yonlendirici (router)
|-- Dockerfile                         # Docker yapilandirmasi
|-- .dockerignore                      # Docker haric dosyalar
|
|-- config/
|   +-- data.php                       # Statik veri kaynagi (10 dagitim)
|
|-- includes/
|   |-- functions.php                  # Cekirdek fonksiyonlar (oturum, XSS, flash)
|   |-- header.php                     # Global HTML basi ve meta taglari
|   |-- navbar.php                     # Navigasyon cubugu
|   |-- footer.php                     # Footer ve JS yukleyici
|   |-- section-title.php              # Yeniden kullanilabilir baslik bilesin
|   |-- hero-linux-ui.php              # Linux masaustu mockup bilesen
|   |-- terminal-widget.php            # Interaktif terminal bilesen
|   +-- desktop-preview-tabs.php       # Masaustu ortami sekmeleri
|
|-- pages/
|   |-- home.php                       # Ana sayfa (11 bolum)
|   |-- what-is-linux.php              # Linux tanitim makalesi
|   |-- history.php                    # Tarihce zaman cizelgesi
|   |-- architecture.php               # Mimari katman gorsellestirmesi
|   |-- distros_list.php               # Dagitim katalogu
|   |-- distro_detail.php              # Dagitim profil sayfasi
|   |-- use_cases.php                  # Kullanim alanlari
|   +-- quiz.php                       # Dagitim oneri testi
|
|-- auth/
|   |-- login.php                      # Giris sayfasi
|   |-- register.php                   # Kayit sayfasi
|   |-- logout.php                     # Oturum sonlandirma
|   +-- forgot-password.php            # Sifre sifirlama
|
|-- user/
|   +-- dashboard.php                  # Kullanici kontrol paneli
|
+-- assets/
    |-- css/
    |   |-- style.css                  # Ana CSS import hub
    |   |-- variables.css              # Tasarim degiskenleri
    |   |-- base.css                   # Reset ve tipografi
    |   |-- layout.css                 # Grid ve yerlestirme
    |   |-- components.css             # UI bilesenleri
    |   |-- animations.css             # Animasyonlar ve efektler
    |   +-- pages/
    |       |-- home.css               # Ana sayfa stilleri
    |       |-- content.css            # Icerik sayfalari
    |       |-- distros.css            # Dagitim sayfalari
    |       |-- history.css            # Zaman cizelgesi
    |       |-- auth.css               # Kimlik dogrulama
    |       +-- dashboard.css          # Kontrol paneli
    |
    +-- js/
        |-- main.js                    # Cekirdek uygulama betigi
        |-- animations.js             # Scroll reveal motoru
        |-- counters.js               # Sayac animasyonu
        |-- terminal.js               # Terminal simulasyonu
        |-- slider.js                  # Sekme degistirici
        +-- particles.js              # Arka plan efektleri
```

---

## Kullanilan Teknolojiler

| Kategori | Teknoloji |
|----------|----------|
| Sunucu Dili | PHP 8.2 |
| Web Sunucusu | Apache 2.4 (Docker icinde) |
| Frontend | HTML5, CSS3, JavaScript (ES6+) |
| Tipografi | Google Fonts (Inter, JetBrains Mono) |
| Ikonlar | Font Awesome 6.5 |
| Konteyner | Docker (php:8.2-apache imaji) |
| Surum Kontrolu | Git / GitHub |
| Deploy | Render.com (Docker tabanlı) |
| Tasarim Yaklasimlari | CSS Custom Properties, Glassmorphism, CSS Grid, Flexbox, IntersectionObserver API, requestAnimationFrame |

---

## Kurulum ve Calistirma

### Docker ile (Onerilen)

```bash
git clone https://github.com/INEXX-max/linux-hub.git
cd linux-hub
docker build -t nexos .
docker run -p 8080:80 nexos
```

Tarayicida `http://localhost:8080` adresine gidin.

### PHP Built-in Sunucu ile

```bash
php -S localhost:8000
```

Tarayicida `http://localhost:8000` adresine gidin.

---

<p align="center">
  <sub>Gelistirici: <strong>Muhammed Inanc</strong></sub>
  <br/>
  <sub>NEXOS Platform — Ozgur Yazilim Insani Ozgur Kilar</sub>
</p>
