<?php
// includes/desktop-preview-tabs.php
// Tabbed desktop environment preview component
$desktops = [
    [
        'id'    => 'gnome',
        'name'  => 'GNOME',
        'desc'  => 'Modern, sade ve üretkenlik odaklı. Ubuntu ve Fedora\'nın varsayılanı.',
        'features' => ['Dinamik çalışma alanları', 'Akıcı animasyonlar', 'Wayland desteği', 'GNOME Extensions'],
        'icon'  => 'fa-solid fa-layer-group',
        'color' => '#4f8fff'
    ],
    [
        'id'    => 'kde',
        'name'  => 'KDE Plasma',
        'desc'  => 'Son derece özelleştirilebilir. Windows\'a en yakın Linux deneyimi.',
        'features' => ['Panel ve widget sistemi', 'KDE Connect', 'Düşük kaynak tüketimi', 'Tiling entegrasyonu'],
        'icon'  => 'fa-solid fa-palette',
        'color' => '#22d3ee'
    ],
    [
        'id'    => 'xfce',
        'name'  => 'XFCE',
        'desc'  => 'Ultra hafif, eski donanımlar için mükemmel. Hız ve basitlik.',
        'features' => ['Çok düşük RAM tüketimi', 'Geleneksel masaüstü', 'Modüler yapı', 'Kararlılık'],
        'icon'  => 'fa-solid fa-feather',
        'color' => '#10b981'
    ],
    [
        'id'    => 'cinnamon',
        'name'  => 'Cinnamon',
        'desc'  => 'Linux Mint ile gelen, Windows kullanıcılarını evinde hissettiren ortam.',
        'features' => ['Windows tarzı görev çubuğu', 'Applet sistemi', 'Tema yöneticisi', 'Kolay öğrenme eğrisi'],
        'icon'  => 'fa-solid fa-cookie-bite',
        'color' => '#f59e0b'
    ],
    [
        'id'    => 'i3',
        'name'  => 'i3 / Tiling',
        'desc'  => 'Fareyi unutun. Tüm pencereler klavye ile otomatik döşenir.',
        'features' => ['Klavye odaklı iş akışı', 'Sıfır kaynak israfı', 'Polybar entegrasyonu', 'Dotfiles kültürü'],
        'icon'  => 'fa-solid fa-table-cells',
        'color' => '#8b5cf6'
    ]
];
?>

<div class="reveal">
    <!-- Tabs -->
    <div class="nx-de-tabs">
        <?php foreach($desktops as $i => $de): ?>
            <button class="nx-de-tab <?= $i === 0 ? 'active' : '' ?>" 
                    onclick="switchDesktop('<?= $de['id'] ?>', this)"
                    style="<?= $i === 0 ? '' : '' ?>">
                <i class="<?= $de['icon'] ?>" style="margin-right:6px;"></i>
                <?= $de['name'] ?>
            </button>
        <?php endforeach; ?>
    </div>
    
    <!-- Panels -->
    <?php foreach($desktops as $i => $de): ?>
    <div class="nx-de-panel <?= $i === 0 ? 'active' : '' ?>" id="de-<?= $de['id'] ?>">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--nx-sp-8); align-items:center;">
            
            <!-- Desktop Preview (CSS mockup inside monitor frame) -->
            <div>
                <div class="nx-monitor" style="max-width:420px;">
                    <div class="nx-monitor-bar">
                        <div class="dot r"></div><div class="dot y"></div><div class="dot g"></div>
                        <div class="title"><?= $de['name'] ?> Desktop</div>
                    </div>
                    <div style="min-height:240px; background:linear-gradient(160deg, #1a1b2e 0%, #0f1023 100%); padding:10px; position:relative;">
                        <!-- Simulated DE Top Bar -->
                        <div style="background:rgba(0,0,0,0.5); padding:4px 8px; border-radius:3px; display:flex; justify-content:space-between; font-size:0.55rem; color:var(--nx-text-dim); margin-bottom:8px;">
                            <span><?= $de['name'] ?></span>
                            <span><?= date('H:i') ?></span>
                        </div>
                        
                        <!-- Simulated window -->
                        <div style="background:rgba(17,24,39,0.9); border:1px solid rgba(255,255,255,0.06); border-radius:5px; width:80%; margin:0 auto;">
                            <div style="padding:4px 8px; background:rgba(0,0,0,0.3); border-bottom:1px solid rgba(255,255,255,0.04); display:flex; align-items:center; gap:4px;">
                                <div style="width:5px; height:5px; border-radius:50%; background:#ff5f56;"></div>
                                <div style="width:5px; height:5px; border-radius:50%; background:#ffbd2e;"></div>
                                <div style="width:5px; height:5px; border-radius:50%; background:#27c93f;"></div>
                                <span style="font-size:0.5rem; color:var(--nx-text-dim); margin-left:4px;">Terminal</span>
                            </div>
                            <div style="padding:8px; font-family:var(--nx-font-mono); font-size:0.55rem; line-height:1.5; color:var(--nx-text-soft);">
                                <div><span style="color:var(--nx-green);">user@<?= $de['id'] ?></span>:<span style="color:<?= $de['color'] ?>;">~</span>$ echo "<?= $de['name'] ?>"</div>
                                <div style="color:<?= $de['color'] ?>;"><?= $de['name'] ?></div>
                                <div><span style="color:var(--nx-green);">user@<?= $de['id'] ?></span>:<span style="color:<?= $de['color'] ?>;">~</span>$ <span class="nx-cursor-blink" style="display:inline-block; width:5px; height:10px; background:var(--nx-green);"></span></div>
                            </div>
                        </div>
                        
                        <!-- DE Taskbar -->
                        <div style="position:absolute; bottom:0; left:0; right:0; height:22px; background:rgba(0,0,0,0.5); display:flex; justify-content:center; align-items:center; gap:8px;">
                            <div style="width:5px; height:5px; border-radius:50%; background:<?= $de['color'] ?>;"></div>
                            <div style="width:5px; height:5px; border-radius:50%; background:var(--nx-text-dim);"></div>
                            <div style="width:5px; height:5px; border-radius:50%; background:var(--nx-text-dim);"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- DE Info -->
            <div>
                <h3 style="color:<?= $de['color'] ?>; margin-bottom:var(--nx-sp-3);"><?= $de['name'] ?></h3>
                <p style="color:var(--nx-text-muted); margin-bottom:var(--nx-sp-5); line-height:1.7;"><?= $de['desc'] ?></p>
                <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:10px;">
                    <?php foreach($de['features'] as $feat): ?>
                    <li style="display:flex; align-items:center; gap:10px; font-size:var(--nx-fs-sm); color:var(--nx-text-soft);">
                        <i class="fa-solid fa-check" style="color:<?= $de['color'] ?>; font-size:0.75rem;"></i>
                        <?= $feat ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
