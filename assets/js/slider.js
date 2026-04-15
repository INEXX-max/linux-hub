// assets/js/slider.js — NEXOS Desktop Environment Tab Switcher
(function() {
    'use strict';

    // Make switchDesktop available globally (called from onclick in PHP)
    window.switchDesktop = function(id, btn) {
        // Deactivate all tabs
        document.querySelectorAll('.nx-de-tab').forEach(t => t.classList.remove('active'));
        // Deactivate all panels
        document.querySelectorAll('.nx-de-panel').forEach(p => p.classList.remove('active'));
        
        // Activate clicked tab & matching panel
        btn.classList.add('active');
        const panel = document.getElementById('de-' + id);
        if (panel) {
            panel.classList.add('active');
        }
    };
})();
