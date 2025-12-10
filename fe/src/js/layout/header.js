document.addEventListener('DOMContentLoaded', function () {
	const menuToggle = document.getElementById('menu-toggle');
	const menuClose = document.getElementById('menu-close');
	const offcanvasMenu = document.getElementById('offcanvas-menu');
	const offcanvasOverlay = document.getElementById('offcanvas-overlay');
	const header = document.querySelector('.site-header');

	// Off canvas
	function openMenu() {
		offcanvasMenu.classList.add('is-active');
		document.body.style.overflow = 'hidden';
	}

	function closeMenu() {
		offcanvasMenu.classList.remove('is-active');
		document.body.style.overflow = '';
	}

	if (menuToggle) {
		menuToggle.addEventListener('click', openMenu);
	}

	if (menuClose) {
		menuClose.addEventListener('click', closeMenu);
	}

	if (offcanvasOverlay) {
		offcanvasOverlay.addEventListener('click', closeMenu);
	}

	const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
	mobileMenuLinks.forEach(link => {
		link.addEventListener('click', closeMenu);
	});

	const mobileCta = document.querySelector('.mobile-cta-button');
	if (mobileCta) {
		mobileCta.addEventListener('click', closeMenu);
	}

	// Header scroll
	function handleScroll() {
		if (window.scrollY > 150) {
			header.classList.add('scrolled');
		} else {
			header.classList.remove('scrolled');
		}
	}

	window.addEventListener('scroll', handleScroll);
	handleScroll();
});