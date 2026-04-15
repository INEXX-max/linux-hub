<?php
// includes/terminal-widget.php
// Interactive terminal simulation component
?>
<div class="nx-terminal reveal" id="interactiveTerminal">
    <div class="nx-terminal-header">
        <div class="nx-terminal-dot red"></div>
        <div class="nx-terminal-dot yellow"></div>
        <div class="nx-terminal-dot green"></div>
        <div class="nx-terminal-title">nexos@platform: ~/terminal</div>
    </div>
    <div class="nx-terminal-body" id="terminalBody">
        <div id="terminalOutput">
            <div class="terminal-line">
                <span class="nx-terminal-prompt">nexos@platform</span>:<span class="nx-terminal-path">~</span>$ <span class="typed-text" data-text="welcome"></span>
            </div>
        </div>
        <div class="terminal-input-line" style="display:flex; align-items:center; margin-top:8px;">
            <span class="nx-terminal-prompt">nexos@platform</span>:<span class="nx-terminal-path">~</span>$&nbsp;
            <input type="text" id="terminalInput" 
                   style="background:none; border:none; color:var(--nx-text); font-family:var(--nx-font-mono); font-size:var(--nx-fs-sm); outline:none; flex:1; caret-color:var(--nx-green);"
                   placeholder="Bir komut deneyin... (ls, pwd, whoami, neofetch, help)"
                   autocomplete="off" spellcheck="false">
        </div>
    </div>
</div>
