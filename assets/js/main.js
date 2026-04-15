// assets/js/main.js — NEXOS Core Application Script
(function() {
    'use strict';

    // ── Mobile Navigation Toggle ──
    function initMobileMenu() {
        const btn = document.getElementById('mobileMenuBtn');
        const nav = document.getElementById('navLinks');
        
        if (!btn || !nav) return;

        btn.addEventListener('click', () => {
            nav.classList.toggle('active');
            const icon = btn.querySelector('i');
            if (nav.classList.contains('active')) {
                icon.className = 'fa-solid fa-xmark';
            } else {
                icon.className = 'fa-solid fa-bars';
            }
        });

        // Close menu on link click
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                const icon = btn.querySelector('i');
                icon.className = 'fa-solid fa-bars';
            });
        });

        // Close menu on outside click
        document.addEventListener('click', (e) => {
            if (!nav.contains(e.target) && !btn.contains(e.target)) {
                nav.classList.remove('active');
                const icon = btn.querySelector('i');
                icon.className = 'fa-solid fa-bars';
            }
        });
    }

    // ── Flash Message Auto-Dismiss ──
    function initFlashMessages() {
        const flashes = document.querySelectorAll('.flash-message, #flash-message');
        flashes.forEach(msg => {
            setTimeout(() => {
                msg.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                msg.style.opacity = '0';
                msg.style.transform = 'translateX(100%)';
                setTimeout(() => msg.remove(), 500);
            }, 4000);
        });
    }

    // ── Active Page Highlighting ──
    function initActiveNav() {
        const currentUrl = window.location.search;
        document.querySelectorAll('.nx-nav-links a').forEach(link => {
            const href = link.getAttribute('href');
            if (href && currentUrl.includes(href.split('?')[1])) {
                link.classList.add('active');
            }
        });
    }

    // ── Score Bars Animation (distro_detail page) ──
    function initScoreBars() {
        const bars = document.querySelectorAll('.nx-score-fill');
        if (!bars.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const targetWidth = entry.target.getAttribute('data-width');
                    if (targetWidth) {
                        entry.target.style.width = targetWidth;
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        bars.forEach(bar => {
            const width = bar.style.width;
            bar.setAttribute('data-width', width);
            bar.style.width = '0';
            observer.observe(bar);
        });
    }

    // ── Quiz Step Navigation (Enhanced) ──
    function initQuizSteps() {
        if (!document.querySelector('.step')) return;

        // Progress bar updates
        const steps = document.querySelectorAll('.step');
        const progressSteps = document.querySelectorAll('.nx-quiz-progress-step');
        
        window.showStep = function(n) {
            steps.forEach((step, i) => {
                step.style.display = i === n ? 'block' : 'none';
                if (i === n) {
                    step.style.animation = 'slideUp 0.4s ease forwards';
                }
            });

            // Update progress
            progressSteps.forEach((ps, i) => {
                ps.classList.remove('active', 'done');
                if (i < n) ps.classList.add('done');
                if (i === n) ps.classList.add('active');
            });
        };
    }

    // ── Initialize ──
    document.addEventListener('DOMContentLoaded', () => {
        initMobileMenu();
        initFlashMessages();
        initActiveNav();
        initScoreBars();
        initQuizSteps();
    });
})();
