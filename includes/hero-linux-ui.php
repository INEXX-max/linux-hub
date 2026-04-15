<?php
// includes/hero-linux-ui.php
// Linux desktop mockup component for the hero section
// Pure CSS/HTML rendered Linux-like desktop environment
?>
<div class="nx-desktop-mockup nx-float-slow">
    <div class="nx-monitor">
        <!-- Title Bar -->
        <div class="nx-monitor-bar">
            <div class="dot r"></div>
            <div class="dot y"></div>
            <div class="dot g"></div>
            <div class="title">nexos@workstation: ~/desktop</div>
        </div>
        
        <!-- Screen Content — Simulated Linux Desktop -->
        <div class="nx-monitor-screen" style="background: linear-gradient(160deg, #1a1b2e 0%, #0f1023 50%, #161830 100%); padding: 12px; min-height: 340px;">
            
            <!-- Top Bar (GNOME-like) -->
            <div style="display:flex; justify-content:space-between; align-items:center; padding:4px 10px; background:rgba(0,0,0,0.4); border-radius:4px; margin-bottom:10px; font-size:0.6rem;">
                <span style="color:var(--nx-text-soft); font-weight:600;">Activities</span>
                <span style="color:var(--nx-text-muted);">
                    <?= date('H:i') ?> · <?= date('d M') ?>
                </span>
                <div style="display:flex; gap:6px; align-items:center;">
                    <i class="fa-solid fa-wifi" style="color:var(--nx-text-dim); font-size:0.5rem;"></i>
                    <i class="fa-solid fa-volume-high" style="color:var(--nx-text-dim); font-size:0.5rem;"></i>
                    <i class="fa-solid fa-battery-full" style="color:var(--nx-green); font-size:0.5rem;"></i>
                </div>
            </div>
            
            <!-- Floating Window 1: Terminal -->
            <div class="nx-float-window" style="left:8px; top:50px; width:55%; z-index:3; animation: float 5s ease-in-out 0.5s infinite;">
                <div class="nx-float-window-bar">
                    <div class="wdot r"></div><div class="wdot y"></div><div class="wdot g"></div>
                    <span class="wtitle">Terminal</span>
                </div>
                <div class="nx-float-window-body" style="background:rgba(0,0,0,0.5);">
                    <div><span style="color:#10b981;">nexos@linux</span>:<span style="color:#4f8fff;">~</span>$ neofetch</div>
                    <div style="color:var(--nx-text-dim); margin:4px 0;">──────────────</div>
                    <div><span style="color:#4f8fff;">OS</span>: NEXOS Linux 6.8</div>
                    <div><span style="color:#4f8fff;">Kernel</span>: 6.8.0-nexos</div>
                    <div><span style="color:#4f8fff;">Shell</span>: zsh 5.9</div>
                    <div><span style="color:#4f8fff;">DE</span>: GNOME 46</div>
                    <div><span style="color:#4f8fff;">CPU</span>: AMD Ryzen 9</div>
                    <div><span style="color:#4f8fff;">Memory</span>: 4.2G / 32G</div>
                    <div style="margin-top:6px;">
                        <span style="background:#ef4444; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                        <span style="background:#f59e0b; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                        <span style="background:#10b981; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                        <span style="background:#4f8fff; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                        <span style="background:#8b5cf6; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                        <span style="background:#ec4899; padding:1px 4px; border-radius:2px;">&nbsp;</span>
                    </div>
                </div>
            </div>
            
            <!-- Floating Window 2: System Monitor -->
            <div class="nx-float-window" style="right:8px; top:40px; width:42%; z-index:2; animation: float 4s ease-in-out 1s infinite;">
                <div class="nx-float-window-bar">
                    <div class="wdot r"></div><div class="wdot y"></div><div class="wdot g"></div>
                    <span class="wtitle">System Monitor</span>
                </div>
                <div class="nx-float-window-body" style="font-size:0.6rem; padding:8px;">
                    <div style="margin-bottom:6px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:2px;"><span style="color:var(--nx-cyan);">CPU</span><span>23%</span></div>
                        <div style="height:4px; background:rgba(255,255,255,0.06); border-radius:2px; overflow:hidden;">
                            <div style="width:23%; height:100%; background:var(--nx-cyan); border-radius:2px;"></div>
                        </div>
                    </div>
                    <div style="margin-bottom:6px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:2px;"><span style="color:var(--nx-blue);">RAM</span><span>41%</span></div>
                        <div style="height:4px; background:rgba(255,255,255,0.06); border-radius:2px; overflow:hidden;">
                            <div style="width:41%; height:100%; background:var(--nx-blue); border-radius:2px;"></div>
                        </div>
                    </div>
                    <div style="margin-bottom:6px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:2px;"><span style="color:var(--nx-green);">Disk</span><span>67%</span></div>
                        <div style="height:4px; background:rgba(255,255,255,0.06); border-radius:2px; overflow:hidden;">
                            <div style="width:67%; height:100%; background:var(--nx-green); border-radius:2px;"></div>
                        </div>
                    </div>
                    <div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:2px;"><span style="color:var(--nx-purple);">GPU</span><span>12%</span></div>
                        <div style="height:4px; background:rgba(255,255,255,0.06); border-radius:2px; overflow:hidden;">
                            <div style="width:12%; height:100%; background:var(--nx-purple); border-radius:2px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Floating Window 3: File Manager (bottom) -->
            <div class="nx-float-window" style="left:15%; bottom:12px; width:70%; z-index:4; animation: float 6s ease-in-out 1.5s infinite;">
                <div class="nx-float-window-bar">
                    <div class="wdot r"></div><div class="wdot y"></div><div class="wdot g"></div>
                    <span class="wtitle">Files — /home/nexos</span>
                </div>
                <div class="nx-float-window-body" style="font-size:0.6rem; padding:8px; display:flex; gap:12px; flex-wrap:wrap; justify-content:center;">
                    <div style="text-align:center; width:48px;">
                        <i class="fa-solid fa-folder" style="font-size:1.2rem; color:#f59e0b; display:block; margin-bottom:3px;"></i>
                        <span style="color:var(--nx-text-dim);">Documents</span>
                    </div>
                    <div style="text-align:center; width:48px;">
                        <i class="fa-solid fa-folder" style="font-size:1.2rem; color:#4f8fff; display:block; margin-bottom:3px;"></i>
                        <span style="color:var(--nx-text-dim);">Projects</span>
                    </div>
                    <div style="text-align:center; width:48px;">
                        <i class="fa-solid fa-folder" style="font-size:1.2rem; color:#10b981; display:block; margin-bottom:3px;"></i>
                        <span style="color:var(--nx-text-dim);">Downloads</span>
                    </div>
                    <div style="text-align:center; width:48px;">
                        <i class="fa-solid fa-file-code" style="font-size:1.2rem; color:#8b5cf6; display:block; margin-bottom:3px;"></i>
                        <span style="color:var(--nx-text-dim);">config.yml</span>
                    </div>
                    <div style="text-align:center; width:48px;">
                        <i class="fa-solid fa-image" style="font-size:1.2rem; color:#ec4899; display:block; margin-bottom:3px;"></i>
                        <span style="color:var(--nx-text-dim);">wallpaper</span>
                    </div>
                </div>
            </div>
            
            <!-- Desktop dock (bottom taskbar hint) -->
            <div style="position:absolute; bottom:0; left:0; right:0; height:28px; background:rgba(0,0,0,0.5); display:flex; justify-content:center; gap:12px; align-items:center; padding:0 16px;">
                <i class="fa-solid fa-house" style="color:var(--nx-text-dim); font-size:0.7rem;"></i>
                <i class="fa-solid fa-terminal" style="color:var(--nx-green); font-size:0.7rem;"></i>
                <i class="fa-brands fa-firefox-browser" style="color:var(--nx-amber); font-size:0.7rem;"></i>
                <i class="fa-solid fa-folder" style="color:var(--nx-blue); font-size:0.7rem;"></i>
                <i class="fa-solid fa-code" style="color:var(--nx-purple); font-size:0.7rem;"></i>
                <i class="fa-solid fa-gear" style="color:var(--nx-text-dim); font-size:0.7rem;"></i>
            </div>
        </div>
    </div>
    
    <!-- Monitor Stand -->
    <div class="nx-monitor-stand"></div>
    <div class="nx-monitor-base"></div>
</div>
