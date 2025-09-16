import './bootstrap';

// Detectar dispositivos móviles
const isMobile = window.innerWidth <= 767;

// Animaciones de entrada al hacer scroll con variantes
const revealObserver = new IntersectionObserver(
	(entries) => {
		for (const entry of entries) {
			if (!entry.isIntersecting) continue;
			const el = entry.target;
			el.classList.add('in'); // marca de entrada
			revealObserver.unobserve(el);
		}
	},
	{ threshold: 0.12 }
);

document.querySelectorAll('[data-reveal]').forEach((el) => {
	const variant = (el.getAttribute('data-anim') || 'fade-up').trim();
	el.classList.add('anim');
	
	// En móviles, convertir animaciones horizontales a fade-up
	if (isMobile && (variant === 'from-left' || variant === 'from-right')) {
		// No agregar clases horizontales en móviles, usar fade-up por defecto
	} else {
		switch (variant) {
			case 'from-left':
				el.classList.add('from-left');
				break;
			case 'from-right':
				el.classList.add('from-right');
				break;
			case 'zoom-in':
				el.classList.add('zoom-in');
				break;
			case 'flip-in':
				el.classList.add('flip-in');
				break;
			case 'fade-up':
			default:
				// usa la transformación por defecto (translateY)
				break;
		}
	}
	// observar para disparar la animación
	revealObserver.observe(el);
});

// Tabs del menú
function setupTabs() {
	const track = document.querySelector('.tabs-track');
	const scrollContainer = track ? track.closest('.overflow-x-auto') : null;
	const indicator = track ? track.querySelector('.tab-indicator') : null;
	const btns = Array.from(document.querySelectorAll('.tab-btn'));
	const panels = Array.from(document.querySelectorAll('.tab-panel'));
	if (!btns.length || !panels.length) return;

	function moveIndicator(btn) {
		if (!indicator || !track || !btn) return;
		const trackRect = track.getBoundingClientRect();
		const btnRect = btn.getBoundingClientRect();
		const left = btnRect.left - trackRect.left + track.scrollLeft;
		indicator.style.left = `${left}px`;
		indicator.style.width = `${btnRect.width}px`;
	}

	function scrollToButton(btn) {
		if (!btn || !scrollContainer) return;
		
		const containerRect = scrollContainer.getBoundingClientRect();
		const btnRect = btn.getBoundingClientRect();
		
		// Calcular posiciones relativas
		const btnLeft = btnRect.left - containerRect.left + scrollContainer.scrollLeft;
		const btnRight = btnLeft + btnRect.width;
		const containerWidth = containerRect.width;
		
		// Margen más amplio para mejor visibilidad
		const margin = Math.min(containerWidth * 0.25, 100); // 25% del ancho o máximo 100px
		
		// Determinar si necesita scroll
		let scrollTo = scrollContainer.scrollLeft;
		
		// Si el botón está fuera del lado derecho o muy cerca del borde
		if (btnRight > scrollContainer.scrollLeft + containerWidth - margin) {
			scrollTo = btnRight - containerWidth + margin * 1.5;
		}
		// Si el botón está fuera del lado izquierdo o muy cerca del borde
		else if (btnLeft < scrollContainer.scrollLeft + margin) {
			scrollTo = btnLeft - margin * 1.5;
		}
		
		// Asegurar que no se pase de los límites
		scrollTo = Math.max(0, Math.min(scrollTo, scrollContainer.scrollWidth - containerWidth));
		
		// Hacer scroll suave si es necesario
		if (Math.abs(scrollTo - scrollContainer.scrollLeft) > 5) {
			scrollContainer.scrollTo({
				left: scrollTo,
				behavior: 'smooth'
			});
		}
	}

	function activate(name) {
		let activeBtn = null;
		btns.forEach((b) => {
			const isActive = b.dataset.tabTarget === name;
			b.classList.toggle('active', isActive);
			if (isActive) activeBtn = b;
		});
		panels.forEach((p) => {
			const show = p.dataset.tabPanel === name;
			p.classList.toggle('hidden', !show);
		});
		
		if (activeBtn) {
			scrollToButton(activeBtn);
			moveIndicator(activeBtn);
		}
	}

	btns.forEach((b) => {
		b.addEventListener('click', () => activate(b.dataset.tabTarget));
	});

	// Activa la primera visible por defecto
	const first = btns.find((b) => b.classList.contains('active')) || btns[0];
	if (first) activate(first.dataset.tabTarget);

	window.addEventListener('resize', () => {
		const current = btns.find((b) => b.classList.contains('active'));
		if (current) {
			scrollToButton(current);
			moveIndicator(current);
		}
	});
}

window.addEventListener('DOMContentLoaded', setupTabs);

// Suavizar scroll para anclas internas
document.addEventListener('click', (e) => {
	const a = e.target.closest('a[href^="#"]');
	if (!a) return;
	const id = a.getAttribute('href');
	if (id.length > 1 && document.querySelector(id)) {
		e.preventDefault();
		document.querySelector(id).scrollIntoView({ behavior: 'smooth', block: 'start' });
	}
});

// Navbar scroll effect
function setupNavbarScroll() {
	const navbar = document.querySelector('header');
	if (!navbar) return;

	let lastScroll = 0;
	
	window.addEventListener('scroll', () => {
		const currentScroll = window.pageYOffset;
		
		// Agregar fondo cuando se hace scroll
		if (currentScroll > 100) {
			navbar.classList.add('scrolled');
		} else {
			navbar.classList.remove('scrolled');
		}
		
		lastScroll = currentScroll;
	});
}

window.addEventListener('DOMContentLoaded', setupNavbarScroll);

// Mobile menu functionality
function setupMobileMenu() {
	const mobileMenuBtn = document.getElementById('mobile-menu-btn');
	const mobileMenu = document.getElementById('mobile-menu');
	
	if (!mobileMenuBtn || !mobileMenu) return;

	mobileMenuBtn.addEventListener('click', () => {
		const isOpen = !mobileMenu.classList.contains('hidden');
		
		if (isOpen) {
			mobileMenu.classList.add('hidden');
			mobileMenuBtn.innerHTML = `
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			`;
		} else {
			mobileMenu.classList.remove('hidden');
			mobileMenuBtn.innerHTML = `
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
				</svg>
			`;
		}
	});

	// Close mobile menu when clicking on a link
	const mobileLinks = mobileMenu.querySelectorAll('a');
	mobileLinks.forEach(link => {
		link.addEventListener('click', () => {
			mobileMenu.classList.add('hidden');
			mobileMenuBtn.innerHTML = `
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			`;
		});
	});

	// Close mobile menu when clicking outside
	document.addEventListener('click', (e) => {
		if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
			mobileMenu.classList.add('hidden');
			mobileMenuBtn.innerHTML = `
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			`;
		}
	});
}

window.addEventListener('DOMContentLoaded', setupMobileMenu);

// Manejar cambios de tamaño de pantalla para animaciones
function handleResize() {
	const currentIsMobile = window.innerWidth <= 767;
	
	// Reinicializar animaciones si cambió el estado móvil/desktop
	if (currentIsMobile !== isMobile) {
		location.reload(); // Recargar para reinicializar animaciones correctamente
	}
}

// Debounce para evitar muchas llamadas al redimensionar
let resizeTimeout;
window.addEventListener('resize', () => {
	clearTimeout(resizeTimeout);
	resizeTimeout = setTimeout(handleResize, 150);
});

