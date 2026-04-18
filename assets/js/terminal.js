// assets/js/terminal.js — linux.dev Interactive Terminal Simulation
(function() {
    'use strict';

    const COMMANDS = {
        'help': [
            'Kullanılabilir komutlar:',
            '  ls          - Dosyaları listele',
            '  pwd         - Çalışma dizinini göster',
            '  whoami      - Kullanıcı adını göster',
            '  neofetch    - Sistem bilgilerini göster',
            '  uname -a    - Kernel bilgisi',
            '  date        - Tarih ve saati göster',
            '  uptime      - Sistem çalışma süresi',
            '  echo [text] - Metni yazdır',
            '  apt install - Paket kurulumu (simülasyon)',
            '  sudo su     - Root kullanıcıya geç',
            '  clear       - Ekranı temizle',
            '  history     - Komut geçmişi',
            '  cat /etc/os-release - Sistem bilgisi',
            '  help        - Bu yardım mesajı'
        ],
        'ls': [
            '<span style="color:#4f8fff;">Documents/</span>  <span style="color:#4f8fff;">Downloads/</span>  <span style="color:#4f8fff;">Projects/</span>  <span style="color:#4f8fff;">.config/</span>',
            '<span style="color:#10b981;">README.md</span>   <span style="color:#10b981;">setup.sh</span>    <span style="color:#f59e0b;">Dockerfile</span>  <span style="color:#8b5cf6;">.bashrc</span>'
        ],
        'pwd': ['/home/nexos'],
        'whoami': ['nexos'],
        'neofetch': [
            '<span style="color:#4f8fff;">       _   _  _______  ______  ____</span>',
            '<span style="color:#4f8fff;">      | \\ | ||  _____||\\  _  \\/ ___|</span>',
            '<span style="color:#4f8fff;">      |  \\| || |____  | |/ / \\___ \\</span>',
            '<span style="color:#4f8fff;">      | |\\  ||  ____| |   /   ___) |</span>',
            '<span style="color:#4f8fff;">      |_| \\_||_______||__/   |____/</span>',
            '',
            '  <span style="color:#4f8fff;">OS</span>: linux.dev 6.8.0',
            '  <span style="color:#4f8fff;">Host</span>: linux.dev Platform',
            '  <span style="color:#4f8fff;">Kernel</span>: 6.8.0-nexos-generic',
            '  <span style="color:#4f8fff;">Shell</span>: zsh 5.9',
            '  <span style="color:#4f8fff;">DE</span>: GNOME 46',
            '  <span style="color:#4f8fff;">Terminal</span>: linux.dev Web Terminal',
            '  <span style="color:#4f8fff;">CPU</span>: AMD Ryzen 9 7950X',
            '  <span style="color:#4f8fff;">Memory</span>: 4.2 GiB / 32 GiB',
            '',
            '  <span style="background:#ef4444;padding:0 6px;border-radius:2px;">&nbsp;</span> <span style="background:#f59e0b;padding:0 6px;border-radius:2px;">&nbsp;</span> <span style="background:#10b981;padding:0 6px;border-radius:2px;">&nbsp;</span> <span style="background:#4f8fff;padding:0 6px;border-radius:2px;">&nbsp;</span> <span style="background:#8b5cf6;padding:0 6px;border-radius:2px;">&nbsp;</span> <span style="background:#ec4899;padding:0 6px;border-radius:2px;">&nbsp;</span>'
        ],
        'uname -a': ['Linux nexos-platform 6.8.0-nexos-generic #1 SMP PREEMPT_DYNAMIC x86_64 GNU/Linux'],
        'date': [new Date().toLocaleString('tr-TR', { dateStyle: 'full', timeStyle: 'medium' })],
        'uptime': ['up 42 days, 7:23, 3 users, load average: 0.42, 0.38, 0.35'],
        'sudo su': [
            '<span style="color:#ef4444;">[sudo] nexos için parola gerekli:</span>',
            '<span style="color:#10b981;">root@nexos-platform</span>:<span style="color:#ef4444;">/root</span># Artık root yetkilerisiniz. Dikkatli olun!',
            '<span style="color:#f59e0b;">⚠ Bu bir simülasyondur. Gerçek root erişimi yoktur.</span>'
        ],
        'apt install': [
            'Paket listeleri okunuyor... Bitti',
            'Bağımlılık ağacı kuruluyor... Bitti',
            'Aşağıdaki EK paketler kurulacak:',
            '  linux-knowledge linux-passion open-source-spirit',
            '<span style="color:#10b981;">✓ 3 paket başarıyla kuruldu!</span>',
            '<span style="color:#f59e0b;">Not: Bu bir simülasyondur 😊</span>'
        ],
        'cat /etc/os-release': [
            'NAME="linux.dev"',
            'VERSION="6.8.0"',
            'ID=nexos',
            'PRETTY_NAME="linux.dev 6.8.0"',
            'HOME_URL="https://nexos.dev"',
            'BUG_REPORT_URL="https://github.com/INEXX-max/linux-hub"'
        ],
        'history': [
            '  1  neofetch',
            '  2  sudo apt update',
            '  3  ls -la /etc/',
            '  4  vim .bashrc',
            '  5  docker compose up -d',
            '  6  git push origin main',
            '  7  help'
        ]
    };

    let commandHistory = [];
    let historyIndex = -1;

    function processCommand(input) {
        const cmd = input.trim().toLowerCase();
        
        if (cmd === '') return [];
        if (cmd === 'clear') return 'CLEAR';
        
        // echo command
        if (cmd.startsWith('echo ')) {
            return [cmd.substring(5)];
        }

        // Check known commands
        for (const key in COMMANDS) {
            if (cmd === key || cmd.startsWith(key + ' ')) {
                // Refresh date
                if (key === 'date') {
                    return [new Date().toLocaleString('tr-TR', { dateStyle: 'full', timeStyle: 'medium' })];
                }
                return COMMANDS[key];
            }
        }

        return [`<span style="color:#ef4444;">bash: ${input}: komut bulunamadı</span>`, 'Yardım için <span style="color:#4f8fff;">help</span> yazın.'];
    }

    function addOutputLine(container, html) {
        const div = document.createElement('div');
        div.innerHTML = html;
        div.style.animation = 'fadeIn 0.15s ease';
        container.appendChild(div);
    }

    function initTerminal() {
        const input = document.getElementById('terminalInput');
        const output = document.getElementById('terminalOutput');
        const body = document.getElementById('terminalBody');
        
        if (!input || !output || !body) return;

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const cmd = this.value;
                
                // Show command
                addOutputLine(output, `<span class="nx-terminal-prompt">nexos@platform</span>:<span class="nx-terminal-path">~</span>$ ${cmd}`);
                
                // Process
                const result = processCommand(cmd);
                
                if (result === 'CLEAR') {
                    output.innerHTML = '';
                } else if (Array.isArray(result)) {
                    result.forEach((line, i) => {
                        setTimeout(() => {
                            addOutputLine(output, line);
                            body.scrollTop = body.scrollHeight;
                        }, i * 40);
                    });
                }
                
                // Add to history
                if (cmd.trim()) {
                    commandHistory.unshift(cmd);
                    historyIndex = -1;
                }
                
                this.value = '';
                
                setTimeout(() => {
                    body.scrollTop = body.scrollHeight;
                }, 200);
            }
            
            // Arrow up/down for history
            if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (historyIndex < commandHistory.length - 1) {
                    historyIndex++;
                    this.value = commandHistory[historyIndex];
                }
            }
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (historyIndex > 0) {
                    historyIndex--;
                    this.value = commandHistory[historyIndex];
                } else {
                    historyIndex = -1;
                    this.value = '';
                }
            }
        });

        // Focus terminal on click
        body.addEventListener('click', () => input.focus());

        // Initial welcome message
        setTimeout(() => {
            const welcomeLines = [
                '<span style="color:#4f8fff;">╔══════════════════════════════════════════╗</span>',
                '<span style="color:#4f8fff;">║</span>  linux.dev Terminal v1.0              <span style="color:#4f8fff;">║</span>',
                '<span style="color:#4f8fff;">║</span>  <span style="color:var(--nx-text-muted);">Linux deneyimini interaktif keşfedin</span>    <span style="color:#4f8fff;">║</span>',
                '<span style="color:#4f8fff;">╚══════════════════════════════════════════╝</span>',
                '',
                'Başlamak için <span style="color:#10b981;">help</span> yazın.'
            ];
            welcomeLines.forEach((line, i) => {
                setTimeout(() => addOutputLine(output, line), i * 60);
            });
        }, 500);
    }

    document.addEventListener('DOMContentLoaded', initTerminal);
})();
