<?php
// config/data.php
// Veritabanı (MySQL) bağlantısı olmadan, sistemi tamamen veritabanından bağımsız çalıştırmak için kullanılan statik veri kaynağıdır.

global $linux_distros;

$linux_distros = [
    [
        'id' => 1,
        'name' => 'Ubuntu',
        'slug' => 'ubuntu',
        'short_desc' => 'Son kullanıcılar için en popüler ve kullanımı en kolay dağıtımlardan biri.',
        'full_desc' => 'Debian tabanlı olup Canonical tarafından geliştirilmektedir. Aradığınız her türlü yazılım ve çözümü çok rahat bir şekilde topluluk forumlarında bulabilirsiniz. Yeni başlayan pclerde sıklıkla tercih edilir.',
        'base_os' => 'Debian',
        'package_manager' => 'APT / Snap',
        'difficulty' => 'Beginner',
        'desktop_environment' => 'GNOME',
        'ram_usage' => '1.5GB - 2GB',
        'score_beginner' => 10,
        'score_gaming' => 8,
        'score_dev' => 9,
        'score_server' => 8,
        'score_old_pc' => 4,
        'score_security' => 6
    ],
    [
        'id' => 2,
        'name' => 'Linux Mint',
        'slug' => 'linux-mint',
        'short_desc' => 'Windows kullanıcıları için geçiş yapması en kolay, konforlu dağıtım.',
        'full_desc' => 'Windows benzeri arayüzü (Cinnamon/Mate), kurulu gelen medya codecleri ve sağlam Debian/Ubuntu tabanı ile acemilerin gözdesidir.',
        'base_os' => 'Ubuntu',
        'package_manager' => 'APT',
        'difficulty' => 'Beginner',
        'desktop_environment' => 'Cinnamon / MATE / XFCE',
        'ram_usage' => '1GB - 1.5GB',
        'score_beginner' => 10,
        'score_gaming' => 7,
        'score_dev' => 8,
        'score_server' => 3,
        'score_old_pc' => 7,
        'score_security' => 5
    ],
    [
        'id' => 3,
        'name' => 'Debian',
        'slug' => 'debian',
        'short_desc' => 'Stabilite ve özgür yazılım deyince akla gelen ana kaya (rock solid) işletim sistemi.',
        'full_desc' => 'Birçok sistemin anasıdır (Ubuntu da dahil). Eski ama inanılmaz dengeli paketler kullanır. Sunucular için mükemmeldir, ancak masaüstünde yeni sürümler için sabır gerektirir.',
        'base_os' => 'Independent',
        'package_manager' => 'APT',
        'difficulty' => 'Intermediate',
        'desktop_environment' => 'GNOME / KDE / XFCE',
        'ram_usage' => '500MB - 1GB',
        'score_beginner' => 5,
        'score_gaming' => 5,
        'score_dev' => 8,
        'score_server' => 10,
        'score_old_pc' => 6,
        'score_security' => 8
    ],
    [
        'id' => 4,
        'name' => 'Arch Linux',
        'slug' => 'arch-linux',
        'short_desc' => 'Kişiselleştirmenin ve kontrolün zirvesi. Sadece komut satırı ile kurulur.',
        'full_desc' => 'Rolling release mantığı ile her yazılımın anında en son sürümünü alırsınız. Ancak sistemi kırma riskiniz de sizin sorumluluğunuzdadır. "I use Arch btw" mottosunun sahibi.',
        'base_os' => 'Independent',
        'package_manager' => 'Pacman',
        'difficulty' => 'Advanced',
        'desktop_environment' => 'Tümü (Kullanıcı seçer)',
        'ram_usage' => 'Sisteme Göre Değişir',
        'score_beginner' => 1,
        'score_gaming' => 9,
        'score_dev' => 10,
        'score_server' => 5,
        'score_old_pc' => 8,
        'score_security' => 7
    ],
    [
        'id' => 5,
        'name' => 'Kali Linux',
        'slug' => 'kali-linux',
        'short_desc' => 'Siber güvenlik, penetrasyon testleri ve hacking için geliştirilmiş devasa araç kutusu.',
        'full_desc' => 'Debian tabanlı olan Kali, günlük kullanım için tasarlanmamıştır. Root yetkisiyle işlemler yapılır, üzerinde binlerce siber güvenlik aracı barındırır.',
        'base_os' => 'Debian',
        'package_manager' => 'APT',
        'difficulty' => 'Advanced',
        'desktop_environment' => 'XFCE',
        'ram_usage' => '1GB - 1.5GB',
        'score_beginner' => 1,
        'score_gaming' => 2,
        'score_dev' => 8,
        'score_server' => 2,
        'score_old_pc' => 5,
        'score_security' => 10
    ],
    [
        'id' => 6,
        'name' => 'Fedora',
        'slug' => 'fedora',
        'short_desc' => 'Yenilikçi, temiz ve açık kaynak felsefesine sıkı sıkıya bağlı modern masaüstü.',
        'full_desc' => 'Red Hat tarafından desteklenir. Yeni kernel sürümleri ve güncel yazılımları çok kararlı bir şekilde son kullanıcıyla ilk buluşturan (Arch kadar ekstrem olmadan) dağıtımdır. Yazılımcılar çok sever.',
        'base_os' => 'Independent',
        'package_manager' => 'DNF',
        'difficulty' => 'Intermediate',
        'desktop_environment' => 'GNOME / KDE / vs.',
        'ram_usage' => '1.2GB - 2GB',
        'score_beginner' => 6,
        'score_gaming' => 7,
        'score_dev' => 10,
        'score_server' => 7,
        'score_old_pc' => 4,
        'score_security' => 8
    ],
    [
        'id' => 7,
        'name' => 'Pop!_OS',
        'slug' => 'pop-os',
        'short_desc' => 'Nvidia sürücülerinin direkt entegre geldiği, oyun ve üretkenlik için popüler sistem.',
        'full_desc' => 'System76 tarafından geliştirilir. Ubuntu tabanlıdır ancak pencereleri döşeme (tiling) mantığı gibi özelliklerle harika bir iş akışı sunar.',
        'base_os' => 'Ubuntu',
        'package_manager' => 'APT / Flatpak',
        'difficulty' => 'Beginner',
        'desktop_environment' => 'COSMIC (GNOME tabanlı)',
        'ram_usage' => '1.5GB - 2GB',
        'score_beginner' => 9,
        'score_gaming' => 10,
        'score_dev' => 9,
        'score_server' => 3,
        'score_old_pc' => 4,
        'score_security' => 6
    ],
    [
        'id' => 8,
        'name' => 'Lubuntu',
        'slug' => 'lubuntu',
        'short_desc' => 'Eski bilgisayarları tekrar canlandırmak için LXQt tabanlı aşırı hafif dağıtım.',
        'full_desc' => 'Eski laptoplar ve zayıf donanımlar için özel tasarlanmıştır. Sistem boştayken çok düşük RAM tüketir.',
        'base_os' => 'Ubuntu',
        'package_manager' => 'APT',
        'difficulty' => 'Beginner',
        'desktop_environment' => 'LXQt',
        'ram_usage' => '300MB - 500MB',
        'score_beginner' => 9,
        'score_gaming' => 3,
        'score_dev' => 5,
        'score_server' => 2,
        'score_old_pc' => 10,
        'score_security' => 5
    ],
    [
        'id' => 9,
        'name' => 'Manjaro',
        'slug' => 'manjaro',
        'short_desc' => 'Arch Linux un zorluklarından arındırılmış, son kullanıcıya hazır Arch deneyimi.',
        'full_desc' => 'Arayüzü ve kurulumu kolaydır. Pacman ve AUR desteği sayesinde dünyadaki hemen hemen tüm programlara saniyeler içinde erişebilirsiniz.',
        'base_os' => 'Arch Linux',
        'package_manager' => 'Pacman',
        'difficulty' => 'Intermediate',
        'desktop_environment' => 'XFCE / KDE / GNOME',
        'ram_usage' => '1GB - 1.5GB',
        'score_beginner' => 7,
        'score_gaming' => 9,
        'score_dev' => 8,
        'score_server' => 3,
        'score_old_pc' => 5,
        'score_security' => 6
    ]
];

// Helper fonk: Slug'dan distro bulma
function getDistroBySlug($slug) {
    global $linux_distros;
    foreach($linux_distros as $d) {
        if($d['slug'] === $slug) {
            return $d;
        }
    }
    return null;
}
?>
