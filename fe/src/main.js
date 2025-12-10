import $ from 'jquery';
import Lenis from 'lenis';
import 'lenis/dist/lenis.css';

window.jQuery = $;
window.$ = $;

import './main.scss';
import './blocks-entry';
import './js/layout/header';

// Smooth scroll
const lenis = new Lenis({
    duration: 1.2,
    smooth: true,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');

        if (href === '#' || href === '') return;

        e.preventDefault();

        const target = document.querySelector(href);
        if (!target) return;

        lenis.scrollTo(target, {
            offset: -80,
            duration: 2
        });
    });
});

