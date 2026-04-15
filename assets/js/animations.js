// assets/js/animations.js — NEXOS Scroll Reveal & Animation Engine
(function() {
    'use strict';

    // ── Scroll Reveal with IntersectionObserver ──
    function initScrollReveal() {
        const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        
        if (!revealElements.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    // Also reveal children in stagger containers
                    if (entry.target.classList.contains('reveal-stagger')) {
                        const children = entry.target.children;
                        for (let i = 0; i < children.length; i++) {
                            children[i].classList.add('revealed');
                        }
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => observer.observe(el));

        // Also observe stagger containers
        document.querySelectorAll('.reveal-stagger').forEach(container => {
            const children = container.children;
            for (let i = 0; i < children.length; i++) {
                children[i].classList.add('reveal');
            }
            observer.observe(container);
        });
    }

    // ── Mouse Follow Glow ──
    function initMouseGlow() {
        const glow = document.getElementById('mouseGlow');
        if (!glow) return;

        let rafId = null;
        let mouseX = 0, mouseY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            glow.classList.add('active');

            if (!rafId) {
                rafId = requestAnimationFrame(() => {
                    glow.style.left = mouseX + 'px';
                    glow.style.top = mouseY + 'px';
                    rafId = null;
                });
            }
        });

        document.addEventListener('mouseleave', () => {
            glow.classList.remove('active');
        });
    }

    // ── Navbar Scroll Effect ──
    function initNavbarScroll() {
        const navbar = document.getElementById('nexosNavbar');
        if (!navbar) return;

        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    // ── Smooth Anchor Scrolling ──
    function initSmoothAnchors() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const offset = 90;
                    const y = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            });
        });
    }

    // ── Initialize all on DOM ready ──
    document.addEventListener('DOMContentLoaded', () => {
        initScrollReveal();
        initMouseGlow();
        initNavbarScroll();
        initSmoothAnchors();
    });
})();
