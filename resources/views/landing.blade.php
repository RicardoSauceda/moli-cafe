<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoLi Café — All you need is coffee</title>
    <meta name="description" content="MoLi Café — Chalkboard hipster cozy style. Buen café, buena vibra." />
    <!-- Fuente para estilo "chalkboard / cozy" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/css/landing.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-moli-black antialiased selection:bg-moli-yellow selection:text-moli-black">
    {{-- ? Navbar sticky --}}
    <header class="sticky top-0 z-50 bg-transparent">
        <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-[4.5rem]">
                <a href="#banner" class="flex items-center gap-2 group">
                    <span class="inline-flex items-center justify-center w-15 h-15 sm:w-15 sm:h-15 rounded-full bg-moli-yellow text-moli-black font-extrabold text-sm sm:text-base overflow-hidden">
                        <img src="{{ asset('img/moli-logo.png') }}" alt="MoLi Café" class="w-full h-full object-cover">
                    </span>
                    <span class="text-lg sm:text-xl lg:text-2xl font-extrabold tracking-wide text-moli-yellow" style="font-family: 'Amatic SC', cursive;">MoLi Café</span>
                </a>

                {{-- Desktop Menu --}}
                <ul class="hidden md:flex items-end gap-4 lg:gap-6 text-white font-semibold text-sm lg:text-base">
                    <li><a class="hover:text-moli-yellow transition" href="#historia">Nuestra Historia</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#menu">Menú</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#ubicacion">Ubicación</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#redes">Redes</a></li>
                </ul>

                {{-- Mobile Menu Button --}}
                <button class="md:hidden text-white hover:text-moli-yellow transition p-2" id="mobile-menu-btn"
                    aria-label="Abrir menú">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div class="md:hidden absolute top-full left-0 w-full bg-[#262020]/95 backdrop-blur-md border-t border-moli-yellow/20 hidden"
                id="mobile-menu">
                <ul class="px-4 py-6 space-y-4">
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#historia">Nuestra Historia</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg" href="#menu">Menú</a>
                    </li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#ubicacion">Ubicación</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#redes">Redes</a></li>
                </ul>
            </div>
        </nav>
    </header>

    {{-- ? Banner --}}
    <section id="banner" class="relative overflow-hidden bg-zinc-900 min-h-screen -mt-[4.5rem]">
        <div class="absolute inset-0 pointer-events-none opacity-[0.05]" aria-hidden="true">
            <div class="w-full h-full"
                style="background-image: radial-gradient(transparent 1px,#fff000 1px), radial-gradient(transparent 1px,#fff000 1px); background-size: 24px 24px; background-position: 0 0,12px 12px;">
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-screen flex items-center pt-[4.5rem]">
            <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-10 items-center w-full">
                <div data-reveal data-anim="fade-up" class="text-center lg:text-left">
                    <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl moli-title leading-tight"
                        style="font-family: 'Amatic SC', cursive;">
                        Bienvenido a <span
                            class="underline decoration-[#fff000] decoration-2 sm:decoration-4 underline-offset-2 sm:underline-offset-4 lg:underline-offset-8 text-[#fff000]">MoLi
                            Café</span>
                    </h1>
                    <p class="mt-4 lg:mt-6 text-lg xs:text-xl sm:text-2xl lg:text-3xl xl:text-4xl text-white tracking-wide"
                        style="font-family: 'Amatic SC', cursive;">
                        "All you need is coffee"
                    </p>
                    <div
                        class="mt-6 lg:mt-10 flex flex-col sm:flex-row gap-3 sm:gap-4 items-center justify-center lg:justify-start">
                        <a href="#menu"
                            class="inline-flex items-center justify-center bg-moli-yellow text-moli-black font-semibold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full hover:scale-105 transition text-base sm:text-lg w-full sm:w-auto">Ver
                            nuestro menú</a>
                        <a href="#ubicacion"
                            class="inline-flex items-center justify-center border-2 border-[#fff000] text-[#fff000] font-semibold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full hover:bg-[#fff000]/10 transition text-base sm:text-lg w-full sm:w-auto">Encuéntranos</a>
                    </div>
                </div>
                <div class="relative px-2 sm:px-4 md:px-6 lg:px-8 xl:px-12" data-reveal data-anim="zoom-in">
                    <div class="w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl mx-auto overflow-hidden rounded-full border-4 border-orange-100">
                        <img src="{{ asset('img/coffee-banner-2.png') }}"
                            alt="MoLi Café - Chalkboard hipster cozy style"
                            class="w-full h-full object-cover transform rotate-[10deg]"
                            style="filter: sepia(0.5) saturate(0.7) brightness(1.3) contrast(0.3) hue-rotate(30deg);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ? Nuestra Historia --}}
    <section id="historia" class="moli-section moli-section-alt border-t border-[#262020]/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid principal 2x2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
                
                <!-- Fila 1, Columna 1: Nuestra Historia -->
                <div data-reveal data-anim="from-left" class="text-center md:text-left order-1">
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl moli-title-black mb-3 sm:mb-4 lg:mb-6" style="font-family: 'Amatic SC', cursive;">Nuestra Historia</h2>
                    <div class="space-y-3 sm:space-y-4 text-xs sm:text-sm md:text-base lg:text-lg text-[#262020]/90 leading-relaxed">
                    <p>
                        Hace 4 años, mi esposo y yo decidimos dar vida a un sueño: abrir una cafetería que reflejara
                        nuestro
                        amor por el buen café y el deseo de compartir momentos especiales con nuestra comunidad.
                    </p>
                    <p>
                        Desde el
                        primer día, pusimos todo nuestro corazón, esfuerzo y dedicación en cada detalle: desde la
                        selección
                        de los granos, hasta el ambiente cálido que invita a quedarse.
                    </p>
                    <p>
                        Lo que comenzó como una idea llena de ilusión, hoy se ha convertido en un espacio donde las
                        personas
                        encuentran mucho más que una taza de café: encuentran un lugar para reunirse, disfrutar,
                        trabajar o
                        simplemente consentirse.
                    </p>
                    <p>
                        Cada sonrisa de nuestros clientes nos recuerda por qué empezamos este proyecto: porque creemos
                        que
                        el café tiene el poder de unir, inspirar y crear recuerdos inolvidables. Nuestra cafetería no
                        solo
                        es un negocio, es la materialización de un sueño familiar construido con amor.
                    </p>
                </div>
                </div>

                <!-- Fila 1, Columna 2: Imagen Historia -->
                <div data-reveal data-anim="from-right" class="relative px-4 sm:px-6 md:px-8 order-2">
                    <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg mx-auto overflow-hidden rounded-3xl shadow-xl border-4 border-moli-yellow/20">
                        <img src="{{ asset('img/cafe-banner-wob.png') }}" 
                             alt="Interior acogedor de MoLi Café" 
                             class="w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80 object-cover transform hover:scale-105 transition-transform duration-500"
                             style="filter: sepia(0.2) saturate(1.1) brightness(1.1);">
                    </div>
                </div>

                <!-- Fila 2, Columna 1: Imagen Misión -->
                <div data-reveal data-anim="from-left" class="relative px-4 sm:px-6 md:px-8 order-4 md:order-3">
                    <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg mx-auto overflow-hidden rounded-3xl shadow-xl border-4 border-moli-yellow/20">
                        <img src="{{ asset('img/coffee-banner-2.png') }}" 
                             alt="Café artesanal de MoLi Café" 
                             class="w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80 object-cover transform hover:scale-105 transition-transform duration-500"
                             style="filter: sepia(0.3) saturate(0.9) brightness(1.2) contrast(1.1);">
                    </div>
                </div>

                <!-- Fila 2, Columna 2: Misión -->
                <div data-reveal data-anim="from-right" class="text-center md:text-left order-3 md:order-4">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl moli-title-black mb-3 sm:mb-4 lg:mb-6"
                        style="font-family: 'Amatic SC', cursive;">Misión</h3>
                    <p class="text-[#262020]/90 leading-relaxed">
                        Brindar a cada cliente una experiencia cálida y acogedora a través de café de calidad, preparado
                        con
                        amor y dedicación, creando un espacio donde las personas se sientan como en casa
                        Compartiendo nuestra pasión por el buen café y el servicio honesto, ofreciendo un lugar donde la
                        comunidad pueda disfrutar, conectar y sentirse bienvenida
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ? Menú con pestañas --}}
    <section id="menu" class="moli-section border-t border-[#262020]/10 bg-zinc-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10" data-reveal data-anim="fade-up">
                <h2 class="text-4xl moli-title" style="font-family: 'Amatic SC', cursive;">Menú</h2>
                <p class="text-neutral-300 mt-2">Explora nuestras categorías</p>
            </div>

            <!-- Tabs -->
            <div class="overflow-x-auto scrollbar-hide" data-reveal data-anim="from-right">
                <div
                    class="tabs-track relative flex gap-1 sm:gap-2 border-b border-[#262020]/10 pb-3 min-w-full scrollbar-hide">
                    <button class="tab-btn active flex-shrink-0" data-tab-target="bebidas">
                        <i class="fas fa-glass-water"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Bebidas</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="botanas">
                        <i class="fas fa-cookie-bite"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Botanas</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="cafes">
                        <i class="fas fa-mug-hot"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Cafés</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="crepas">
                        <i class="fas fa-layer-group"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Crepas</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="frappes">
                        <i class="fas fa-blender"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Frappes</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="hamburguesas">
                        <i class="fas fa-hamburger"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Hamburguesas</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="pizzas">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Pizzas</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="promociones">
                        <i class="fas fa-tags"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Promociones</span>
                    </button>
                    <button class="tab-btn flex-shrink-0" data-tab-target="sandwiches">
                        <i class="fas fa-bread-slice"></i>
                        <span class="tab-btn-text sm:inline ml-1 sm:ml-2">Sandwiches</span>
                    </button>
                    <span class="tab-indicator" aria-hidden="true"></span>
                </div>
            </div>

            <!-- Panels -->
            <div class="mt-8">
                <!-- Bebidas -->
                <div class="tab-panel" data-tab-panel="bebidas" data-reveal data-anim="fade-up">
                    <h3 class="panel-title text-neutral-300">Bebidas</h3>
                    <div
                        class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                        <div class="menu-card">
                            <img src="https://images.unsplash.com/photo-1561043433-aaf687c4cf4e?q=80&w=800&auto=format&fit=crop"
                                alt="Limonada con hierbabuena" class="menu-img">
                            <div class="menu-info">
                                <h4>Limonada con hierbabuena</h4>
                            </div>
                        </div>
                        <div class="menu-card">
                            <img src="https://images.unsplash.com/photo-1517705008128-361805f42e86?q=80&w=800&auto=format&fit=crop"
                                alt="Té chai especiado" class="menu-img">
                            <div class="menu-info">
                                <h4>Té chai especiado</h4>
                            </div>
                        </div>
                        <div class="menu-card">
                            <img src="https://images.unsplash.com/photo-1481391319762-47c0d7bc80a8?q=80&w=800&auto=format&fit=crop"
                                alt="Chocolate caliente artesanal" class="menu-img">
                            <div class="menu-info">
                                <h4>Chocolate caliente artesanal</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botanas -->
                <div class="tab-panel hidden" data-tab-panel="botanas" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Botanas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1604909052743-89b61b6c07f2?q=80&w=800&auto=format&fit=crop"
                                alt="Nachos clásicos" class="menu-img">
                            <div class="menu-info">
                                <h4>Nachos clásicos</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1604908177251-f8b23dfc3b39?q=80&w=800&auto=format&fit=crop"
                                alt="Papas gajo con paprika" class="menu-img">
                            <div class="menu-info">
                                <h4>Papas gajo con paprika</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1592329427707-6492b97e52d7?q=80&w=800&auto=format&fit=crop"
                                alt="Dedos de queso" class="menu-img">
                            <div class="menu-info">
                                <h4>Dedos de queso</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cafés -->
                <div class="tab-panel hidden" data-tab-panel="cafes" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Cafés</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1512568400610-62da28bc8a13?q=80&w=800&auto=format&fit=crop"
                                alt="Espresso" class="menu-img">
                            <div class="menu-info">
                                <h4>Espresso</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?q=80&w=800&auto=format&fit=crop"
                                alt="Latte" class="menu-img">
                            <div class="menu-info">
                                <h4>Latte</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1432107294469-414527cb5c65?q=80&w=800&auto=format&fit=crop"
                                alt="Cappuccino" class="menu-img">
                            <div class="menu-info">
                                <h4>Cappuccino</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Crepas -->
                <div class="tab-panel hidden" data-tab-panel="crepas" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Crepas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1572571702210-7719c3e0046e?q=80&w=800&auto=format&fit=crop"
                                alt="Crepa de Nutella y fresas" class="menu-img">
                            <div class="menu-info">
                                <h4>Nutella y fresas</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1558457655-b4e1d94847a2?q=80&w=800&auto=format&fit=crop"
                                alt="Crepa de cajeta y nuez" class="menu-img">
                            <div class="menu-info">
                                <h4>Cajeta y nuez</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1589308078059-be1415eab4c3?q=80&w=800&auto=format&fit=crop"
                                alt="Crepa de jamón y queso" class="menu-img">
                            <div class="menu-info">
                                <h4>Jamón y queso</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Frappes y Smoothies -->
                <div class="tab-panel hidden" data-tab-panel="frappes" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Frappes y Smoothies</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=800&auto=format&fit=crop"
                                alt="Frappe de caramelo" class="menu-img">
                            <div class="menu-info">
                                <h4>Frappe de caramelo</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1515542706656-8e6ef17a1521?q=80&w=800&auto=format&fit=crop"
                                alt="Smoothie de frutos rojos" class="menu-img">
                            <div class="menu-info">
                                <h4>Smoothie frutos rojos</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1526312426976-593c6c1d3ab6?q=80&w=800&auto=format&fit=crop"
                                alt="Smoothie tropical" class="menu-img">
                            <div class="menu-info">
                                <h4>Smoothie tropical</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hamburguesas -->
                <div class="tab-panel hidden" data-tab-panel="hamburguesas" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Hamburguesas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=800&auto=format&fit=crop"
                                alt="Hamburguesa clásica con queso" class="menu-img">
                            <div class="menu-info">
                                <h4>Clásica con queso</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1553979459-d2229ba7433b?q=80&w=800&auto=format&fit=crop"
                                alt="Hamburguesa BBQ con tocino" class="menu-img">
                            <div class="menu-info">
                                <h4>BBQ con tocino</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=800&auto=format&fit=crop"
                                alt="Hamburguesa portobello" class="menu-img">
                            <div class="menu-info">
                                <h4>Portobello</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pizzas -->
                <div class="tab-panel hidden" data-tab-panel="pizzas" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Pizzas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1541744572-9f5a19d2804a?q=80&w=800&auto=format&fit=crop"
                                alt="Pizza Margarita" class="menu-img">
                            <div class="menu-info">
                                <h4>Margarita</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1548365328-9f547fb0953b?q=80&w=800&auto=format&fit=crop"
                                alt="Pizza peperoni" class="menu-img">
                            <div class="menu-info">
                                <h4>Peperoni</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1548366086-7c1b1d5b95a1?q=80&w=800&auto=format&fit=crop"
                                alt="Pizza cuatro quesos" class="menu-img">
                            <div class="menu-info">
                                <h4>Cuatro quesos</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Promociones -->
                <div class="tab-panel hidden" data-tab-panel="promociones" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Promociones</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1518756131217-31eb79b20e8f?q=80&w=800&auto=format&fit=crop"
                                alt="Promociones" class="menu-img">
                            <div class="menu-info">
                                <h4>2x1 en café americano (martes)</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1488477304112-4944851de03d?q=80&w=800&auto=format&fit=crop"
                                alt="Combo crepa + bebida" class="menu-img">
                            <div class="menu-info">
                                <h4>Combo crepa + bebida</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1484980859177-5ac1249fda6f?q=80&w=800&auto=format&fit=crop"
                                alt="Descuento estudiante" class="menu-img">
                            <div class="menu-info">
                                <h4>Descuento estudiante</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sandwiches -->
                <div class="tab-panel hidden" data-tab-panel="sandwiches" data-reveal data-anim="fade-up">
                    <h3 class="panel-title">Sandwiches</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=800&auto=format&fit=crop"
                                alt="Sandwich jamón y queso" class="menu-img">
                            <div class="menu-info">
                                <h4>Jamón y queso</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1551024601-bec78aea704b?q=80&w=800&auto=format&fit=crop"
                                alt="Sandwich pollo a la parrilla" class="menu-img">
                            <div class="menu-info">
                                <h4>Pollo a la parrilla</h4>
                            </div>
                        </div>
                        <div class="menu-card"><img
                                src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop"
                                alt="Sandwich vegetariano" class="menu-img">
                            <div class="menu-info">
                                <h4>Vegetariano</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            
            <!-- Botón Menú Completo -->
            <div class="mt-12 text-center" data-reveal data-anim="zoom-in">
                <a href="#" class="menu-pdf-btn" onclick="alert('El menú completo en PDF estará disponible próximamente'); return false;">
                    <i class="fas fa-file-pdf"></i>
                    <span>Ver Menú Completo</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ? Ubicación  --}}
    <section id="ubicacion" class="moli-section moli-section-alt border-t border-[#262020]/10 section-decorative">
        <!-- Elementos decorativos con iconos de café -->
        <div class="ubicacion-decorations">
            <i class="fas fa-mug-hot coffee-icon-decoration extra-large mug" style="--rotation: -15deg;"></i>
            <i class="fas fa-seedling coffee-icon-decoration small leaf" style="--rotation: 20deg;"></i>
            <i class="fas fa-coffee coffee-icon-decoration medium mug" style="--rotation: -10deg;"></i>
            <i class="fas fa-heart coffee-icon-decoration tiny heart" style="--rotation: 25deg;"></i>
            <i class="fas fa-sun coffee-icon-decoration medium sun" style="--rotation: 35deg;"></i>
            <i class="fas fa-leaf coffee-icon-decoration large leaf" style="--rotation: -25deg;"></i>
            <i class="fas fa-circle coffee-icon-decoration small circle" style="--rotation: 10deg;"></i>
            <i class="fas fa-star coffee-icon-decoration tiny star" style="--rotation: -30deg;"></i>
            <i class="fas fa-mug-hot coffee-icon-decoration small mug" style="--rotation: 15deg;"></i>
            <i class="fas fa-coffee coffee-icon-decoration tiny bean" style="--rotation: -20deg;"></i>
        </div>
        <!-- Formas abstractas -->
        <div class="abstract-decoration circle-1"></div>
        <div class="abstract-decoration circle-2"></div>
        <div class="abstract-decoration" style="width: 60px; height: 60px; top: 30%; right: 30%; background: radial-gradient(circle at 50% 50%, #f5deb3, transparent 60%); animation-delay: 4s;"></div>
        <div class="abstract-decoration" style="width: 100px; height: 80px; bottom: 40%; left: 35%; background: linear-gradient(60deg, #deb887, transparent 70%); border-radius: 60%; animation-delay: 8s;"></div>
        
        <div
            class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-6 lg:gap-8 items-start lg:items-center relative z-10">
            <div data-reveal data-anim="from-left" class="text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl moli-title-black mb-4 lg:mb-6"
                    style="font-family: 'Amatic SC', cursive;">Ubicación</h2>
                <div class="space-y-3 text-[#262020]/90 text-sm sm:text-base">
                    <div>
                        <span class="font-semibold block sm:inline">Dirección:</span>
                        <span class="block sm:inline">Lagunas de Montebello s/n, Col, Los Laguitos INFONAVIT, 29020
                            Tuxtla Gutiérrez, Chis.</span>
                    </div>
                    <div>
                        <span class="font-semibold block sm:inline">Horarios:</span>
                        <span class="block sm:inline">Lunes a Domingo: 8:00 am – 10:00 pm</span>
                    </div>
                    <div>
                        <span class="font-semibold block sm:inline">Teléfono:</span>
                        <span class="block sm:inline">(+52) 961 000 0000</span>
                    </div>
                    <div>
                        <span class="font-semibold block sm:inline">Correo Electrónico:</span>
                        <span class="block sm:inline">contacto@molicafe.mx</span>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3"
                        style="font-family: 'Amatic SC', cursive;">¿Cómo llegar?</h3>
                    <p class="text-[#262020]/90 leading-relaxed text-sm sm:text-base">
                        Estamos ubicados en Lagunas de Montebello, a solo 5 cuadras a la derecha de la Carretera
                        Chicoasen/Carretera Internacional/Blvd. Laguitos partiendo del reloj floral con fácil acceso en
                        transporte público como personal.
                    </p>
                </div>
            </div>
            <div class="w-full rounded-2xl overflow-hidden border border-[#262020]/10 shadow-lg mt-6 lg:mt-0"
                data-reveal data-anim="from-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4596.239036336267!2d-93.15096989999999!3d16.7642019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ed27f86e2e869d%3A0xf7691f6e2e7f6e35!2sMoLi%20Caf%C3%A9!5e1!3m2!1ses!2smx!4v1757721633969!5m2!1ses!2smx"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="sm:h-80 lg:h-96"></iframe>
            </div>
        </div>
    </section>

    {{-- ? Redes Sociales  --}}
    <section id="redes" class="moli-section border-t border-[#262020]/10 bg-white section-decorative">
        <!-- Elementos decorativos con iconos de café -->
        <div class="redes-decorations">
            <i class="fas fa-star coffee-icon-decoration extra-large star" style="--rotation: 15deg;"></i>
            <i class="fas fa-mug-hot coffee-icon-decoration medium mug" style="--rotation: -25deg;"></i>
            <i class="fas fa-leaf coffee-icon-decoration large leaf" style="--rotation: 10deg;"></i>
            <i class="fas fa-coffee coffee-icon-decoration small bean" style="--rotation: -20deg;"></i>
            <i class="fas fa-heart coffee-icon-decoration medium heart" style="--rotation: 30deg;"></i>
            <i class="fas fa-sun coffee-icon-decoration small sun" style="--rotation: -15deg;"></i>
            <i class="fas fa-circle coffee-icon-decoration tiny circle" style="--rotation: 20deg;"></i>
            <i class="fas fa-seedling coffee-icon-decoration medium leaf" style="--rotation: -35deg;"></i>
            <i class="fas fa-mug-hot coffee-icon-decoration tiny warm" style="--rotation: 25deg;"></i>
            <i class="fas fa-star coffee-icon-decoration small star" style="--rotation: -10deg;"></i>
        </div>
        <!-- Formas abstractas -->
        <div class="abstract-decoration circle-1" style="top: 15%; left: 8%;"></div>
        <div class="abstract-decoration circle-2" style="bottom: 15%; right: 8%;"></div>
        <div class="abstract-decoration" style="width: 90px; height: 90px; top: 40%; right: 35%; background: conic-gradient(from 45deg, #f5deb3, transparent 180deg, #deb887); border-radius: 50%; animation-delay: 2s;"></div>
        <div class="abstract-decoration" style="width: 70px; height: 50px; bottom: 35%; left: 25%; background: linear-gradient(-30deg, #d2b48c, transparent 60%); border-radius: 70% 30% 40% 60%; animation-delay: 6s;"></div>
        <div class="abstract-decoration" style="width: 40px; height: 40px; top: 8%; right: 45%; background: radial-gradient(ellipse at center, #daa520, transparent 80%); animation-delay: 10s;"></div>
        
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div data-reveal data-anim="fade-up">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl moli-title mb-4 lg:mb-6"
                    style="font-family: 'Amatic SC', cursive;">Síguenos</h2>
                <p class="text-[#262020]/70 mb-6 lg:mb-10 text-sm sm:text-base">Conoce nuestras novedades y promociones
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 lg:gap-6 max-w-md sm:max-w-none mx-auto"
                data-reveal data-anim="fade-up">
                <a href="#"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-facebook mr-2"></i>Facebook
                </a>
                <a href="#"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-instagram mr-2"></i>Instagram
                </a>
                <span
                    class="px-6 py-3 rounded-full border border-[#262020]/20 text-[#262020]/60 w-full sm:w-auto text-sm sm:text-base">
                    <i class="fab fa-x-twitter mr-2"></i>X (Próximamente)
                </span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-[#fff000]/10 bg-[#262020] text-[#fff000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
                <div class="text-center sm:text-left">
                    <h4 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4" style="font-family: 'Amatic SC', cursive;">
                        MoLi Café</h4>
                    <p class="text-xs sm:text-sm text-[#fff000]/80 leading-relaxed">Buen café, buena vibra. Un espacio
                        cozy para disfrutar bebidas,
                        cafés, crepas y más con un estilo chalkboard hipster.</p>
                </div>
                <div class="text-center sm:text-left">
                    <h5 class="text-lg sm:text-xl font-bold mb-3" style="font-family: 'Amatic SC', cursive;">Visítanos
                    </h5>
                    <ul class="text-xs sm:text-sm space-y-2 text-[#fff000]/90">
                        <li><span class="font-semibold block sm:inline">Dirección:</span>
                            <span class="block sm:inline">Lagunas de Montebello s/n, Col, Los Laguitos INFONAVIT, 29020
                                Tuxtla Gutiérrez, Chis.</span>
                        </li>
                        <li><span class="font-semibold block sm:inline">Horarios:</span>
                            <span class="block sm:inline">8:00 am – 10:00 pm (L-D)</span>
                        </li>
                        <li><span class="font-semibold block sm:inline">Tel:</span>
                            <span class="block sm:inline">(+52) 961 000 0000</span>
                        </li>
                        <li><span class="font-semibold block sm:inline">Correo:</span>
                            <span class="block sm:inline">contacto@molicafe.mx</span>
                        </li>
                    </ul>
                </div>
                <div class="text-center sm:text-left sm:col-span-2 lg:col-span-1">
                    <h5 class="text-lg sm:text-xl font-bold mb-3" style="font-family: 'Amatic SC', cursive;">Navega</h5>
                    <div class="flex flex-col gap-2 sm:gap-3 text-xs sm:text-sm max-w-sm mx-auto sm:mx-0">
                        <a href="#menu"
                            class="px-4 py-2 rounded-full bg-[#fff000] text-[#262020] font-semibold text-center hover:bg-[#fff000]/90 transition">Ver
                            menú</a>
                        <a href="#ubicacion"
                            class="px-4 py-2 rounded-full border border-[#fff000] text-[#fff000] text-center hover:bg-[#fff000]/10 transition">Cómo
                            llegar</a>
                        <a href="#redes"
                            class="px-4 py-2 rounded-full border border-[#fff000] text-[#fff000] text-center hover:bg-[#fff000]/10 transition">Síguenos</a>
                    </div>
                </div>
            </div>
            <div
                class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-[#fff000]/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs sm:text-sm text-[#fff000]/80">
                <p class="text-center sm:text-left">© <span id="year"></span> MoLi Café. Todos los derechos reservados.
                </p>
                <nav class="flex items-center gap-3 sm:gap-4 text-center">
                    <a href="#historia" class="hover:text-white transition">Historia</a>
                    <a href="#menu" class="hover:text-white transition">Menú</a>
                    <a href="#ubicacion" class="hover:text-white transition">Ubicación</a>
                    <a href="#redes" class="hover:text-white transition">Redes</a>
                </nav>
            </div>
        </div>
    </footer>

    <!-- Estilos movidos a resources/css/landing.css -->

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>