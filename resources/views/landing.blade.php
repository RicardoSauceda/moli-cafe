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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                    <li><a class="hover:text-moli-yellow transition" href="#promociones">Promociones</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#historia">Nuestra Historia</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#menu">Menú</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#ubicacion">Ubicación</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#reseñas">Reseñas</a></li>
                    <li><a class="hover:text-moli-yellow transition" href="#contactanos">Contactanos</a></li>
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
                            href="#promociones">Promociones</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#historia">Nuestra Historia</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg" href="#menu">Menú</a>
                    </li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#ubicacion">Ubicación</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#reseñas">Reseñas</a></li>
                    <li><a class="block text-white hover:text-moli-yellow transition py-2 text-lg"
                            href="#contactanos">Contactanos</a></li>
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
                        <img src="{{ asset('img/moli-logo.png') }}"
                            alt="MoLi Café - Chalkboard hipster cozy style"
                            class="w-full h-full object-cover transform rotate-[10deg]">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ? Promociones Slider --}}
    <section id="promociones" class="moli-section border-t border-[#262020]/10 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado -->
            <div class="mb-8 lg:mb-12 text-center" data-reveal data-anim="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl moli-title-black mb-3 lg:mb-4" style="font-family: 'Amatic SC', cursive;">
                    Promociones Especiales
                </h2>
                <p class="text-[#262020]/70 text-base sm:text-lg">Ofertas exclusivas que no te puedes perder</p>
            </div>

            <!-- Slider de Promociones -->
            @if($promotions->count() > 0)
                <div class="swiper promotions-swiper" data-reveal data-anim="zoom-in">
                    <div class="swiper-wrapper">
                        @foreach($promotions as $promotion)
                            <div class="swiper-slide">
                                <div class="promo-card">
                                    <div class="promo-image-container">
                                        @if($promotion->image_path)
                                            <img src="{{ Storage::url($promotion->image_path) }}" 
                                                 alt="{{ $promotion->title }}" 
                                                 class="promo-image">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=800&auto=format&fit=crop" 
                                                 alt="{{ $promotion->title }}" 
                                                 class="promo-image">
                                        @endif
                                        <div class="promo-badge">{{ $promotion->getDiscountBadge() }}</div>
                                    </div>
                                    <div class="promo-content">
                                        <h3 class="promo-title">{{ $promotion->title }}</h3>
                                        <p class="promo-description">{{ $promotion->description }}</p>
                                        <p class="promo-validity">{{ $promotion->getValidityText() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navegación -->
                    <div class="swiper-button-prev promo-button-prev"></div>
                    <div class="swiper-button-next promo-button-next"></div>

                    <!-- Paginación -->
                    <div class="swiper-pagination promo-pagination"></div>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                    <i class="fas fa-tags text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600 text-4xl " style="font-family: 'Amatic SC', cursive;">¡Espera nuestras promociones pronto!</p>
                </div>
            @endif
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
                        <img src="{{ asset('img/moli-owners.jpeg') }}" 
                             alt="Interior acogedor de MoLi Café" 
                             class="w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80 object-cover transform hover:scale-105 transition-transform duration-500"
                             style="filter: sepia(0.2) saturate(1.1) brightness(1.1);">
                    </div>
                </div>

                <!-- Fila 2, Columna 1: Imagen Misión -->
                <div data-reveal data-anim="from-left" class="relative px-4 sm:px-6 md:px-8 order-4 md:order-3">
                    <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg mx-auto overflow-hidden rounded-3xl shadow-xl border-4 border-moli-yellow/20">
                        <img src="{{ asset('img/moli-mision.jpg') }}" 
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
                        comunidad pueda disfrutar, conectar y sentirse bienvenida
                    </p>
                    <div data-reveal data-anim="fade-up" class="mt-5">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl moli-title-black mb-3 sm:mb-4 lg:mb-4" style="font-family: 'Amatic SC', cursive;">Visión</h3>
                        <div class="space-y-3 sm:space-y-4 text-xs sm:text-sm md:text-base lg:text-lg text-[#262020]/90 leading-relaxed max-w-3xl mx-auto">
                            <p>
                                Ser reconocidos como la cafetería favorita, un lugar donde cada cliente encuentre calidad, calidez y momentos memorables.
                            </p>
                            <p>
                                Convirtiéndonos en un referente de café y hospitalidad, creciendo de manera sostenible sin perder la esencia familiar que nos caracteriza.
                            </p>
                            <p>
                                Con este haciéndonos perdurar en el tiempo como un símbolo de amor, esfuerzo y dedicación, inspirando a futuras generaciones a soñar y construir con pasión.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ? Menú con pestañas --}}
    <section id="menu" class="moli-section border-t border-[#262020]/10 bg-zinc-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10" data-reveal data-anim="fade-up">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <h2 class="text-4xl moli-title" style="font-family: 'Amatic SC', cursive;">Menú</h2>
                        <p class="text-neutral-300 mt-2">Explora nuestras categorías</p>
                    </div>
                    <!-- Selector de Moneda -->
                    <div class="flex items-center gap-2 bg-[#262020]/30 rounded-full px-4 py-2">
                        <span class="text-neutral-300 text-sm font-medium">Moneda:</span>
                        <button id="currency-mxn" class="currency-btn active px-3 py-1 rounded-full text-sm font-semibold transition">
                            MXN $
                        </button>
                        <button id="currency-usd" class="currency-btn px-3 py-1 rounded-full text-sm font-semibold transition">
                            USD $
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="overflow-x-auto scrollbar-hide" data-reveal data-anim="from-right">
                <div
                    class="tabs-track relative flex gap-1 sm:gap-2 border-b border-[#262020]/10 pb-3 min-w-full scrollbar-hide">
                    @php
                        $categoryIcons = [
                            'Bebidas Frías' => 'fas fa-glass-water',
                            'Bebidas Calientes' => 'fas fa-mug-hot',
                            'Pa\' Compartir' => 'fas fa-cookie-bite',
                            'Crepas Saladas' => 'fas fa-layer-group',
                            'Crepas Dulces' => 'fas fa-layer-group',
                            'Chapatas y Hamburguesas' => 'fas fa-hamburger',
                            'Pizzas' => 'fas fa-pizza-slice',
                            'Postres' => 'fas fa-birthday-cake',
                            'default' => 'fas fa-utensils'
                        ];
                    @endphp
                    @foreach($categories as $index => $category)
                        <button class="tab-btn {{ $index === 0 ? 'active' : '' }} flex-shrink-0" data-tab-target="category-{{ $category->id }}">
                            <i class="{{ $categoryIcons[$category->name] ?? $categoryIcons['default'] }}"></i>
                            <span class="tab-btn-text sm:inline ml-1 sm:ml-2">{{ $category->name }}</span>
                        </button>
                    @endforeach
                    <span class="tab-indicator" aria-hidden="true"></span>
                </div>
            </div>

            <!-- Panels -->
            <div class="mt-8">
                @foreach($categories as $index => $category)
                    <div class="tab-panel {{ $index === 0 ? '' : 'hidden' }}" data-tab-panel="category-{{ $category->id }}" data-reveal data-anim="fade-up">
                        <h3 class="panel-title text-neutral-300">{{ $category->name }}</h3>
                        @if($category->products->count() > 0)
                            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                                @foreach($category->products as $product)
                                    <div class="menu-card">
                                        @if($product->image_path)
                                            <img src="{{ Storage::url($product->image_path) }}" 
                                                 alt="{{ $product->product_name }}" 
                                                 class="menu-img">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=800&auto=format&fit=crop" 
                                                 alt="{{ $product->product_name }}" 
                                                 class="menu-img">
                                        @endif
                                        <div class="menu-info">
                                            <h4>{{ $product->product_name }}</h4>
                                            @if($product->description)
                                                <p class="text-sm text-gray-300 mt-1">{{ Str::limit($product->description, 60) }}</p>
                                            @endif
                                            @if($product->price)
                                                <p class="product-price text-moli-yellow font-semibold mt-2" data-price-mxn="{{ $product->price }}">
                                                    <span class="currency-symbol">$</span><span class="price-value">{{ number_format($product->price, 0) }}</span> <span class="currency-code">MXN</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-400">No hay productos disponibles en esta categoría</p>
                            </div>
                        @endif
                    </div>
                @endforeach
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

    {{-- ? Reseñas --}}
    <section id="reseñas" class="moli-section border-t border-[#262020]/10 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 text-center" data-reveal data-anim="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl moli-title-black mb-4" style="font-family: 'Amatic SC', cursive;">Lo que dicen nuestros clientes</h2>
                <p class="text-[#262020]/70 text-lg">Experiencias reales de quienes nos visitan</p>
            </div>
            
            <div class="flex justify-center" data-reveal data-anim="zoom-in">
                <!-- Elfsight Google Reviews | Untitled Google Reviews -->
                <script src="https://elfsightcdn.com/platform.js" async></script>
                <div class="elfsight-app-6071a388-b66a-45d6-bbf0-1ed973b10d63" data-elfsight-app-lazy></div>
            </div>
        </div>
    </section>

    {{-- ? Redes Sociales Seccion "Contactanos"  --}}
    <section id="contactanos" class="moli-section border-t border-[#262020]/10 bg-white section-decorative">
        <!-- Elementos decorativos con iconos de café -->
        <div class="contactanos-decorations">
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
                    style="font-family: 'Amatic SC', cursive;">Contactanos</h2>
                <p class="text-[#262020]/70 mb-6 lg:mb-10 text-sm sm:text-base">Conoce nuestras novedades y promociones
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 lg:gap-6 max-w-md sm:max-w-none mx-auto"
                data-reveal data-anim="fade-up">
                <a href="https://www.facebook.com/cafemoli" target="_blank" rel="noopener noreferrer"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-facebook mr-2"></i>Facebook
                </a>
                <a href="https://www.instagram.com/mo.licafe/" target="_blank" rel="noopener noreferrer"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-instagram mr-2"></i>Instagram
                </a>
                <a href="https://www.tiktok.com/@moli_cafe" target="_blank" rel="noopener noreferrer"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-tiktok mr-2"></i>TikTok
                </a>
                <a href="https://www.ubereats.com/store/moli-cafe-moli-cafe/yxUtmGKWU8WF7ZHxKEBXpQ?diningMode=DELIVERY" target="_blank" rel="noopener noreferrer"
                    class="px-6 py-3 rounded-full border-2 border-[#262020] text-[#262020] hover:bg-[#262020]/5 transition w-full sm:w-auto text-sm sm:text-base font-medium">
                    <i class="fab fa-uber mr-2"></i>Uber Eats
                </a>
                {{-- <span
                    class="px-6 py-3 rounded-full border border-[#262020]/20 text-[#262020]/60 w-full sm:w-auto text-sm sm:text-base">
                    <i class="fab fa-x-twitter mr-2"></i>X (Próximamente)
                </span> --}}
            </div>
        </div>
    </section>

    {{-- ? Footer --}}
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
                        <a href="#contactanos"
                            class="px-4 py-2 rounded-full border border-[#fff000] text-[#fff000] text-center hover:bg-[#fff000]/10 transition">Contactanos</a>
                    </div>
                </div>
            </div>
            <div
                class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-[#fff000]/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs sm:text-sm text-[#fff000]/80">
                <p class="text-center sm:text-left">© <span id="year"></span> MoLi Café. Todos los derechos reservados.
                </p>
                <nav class="flex items-center gap-3 sm:gap-4 text-center">
                    <a href="#promociones" class="hover:text-white transition">Promociones</a>
                    <a href="#historia" class="hover:text-white transition">Historia</a>
                    <a href="#menu" class="hover:text-white transition">Menú</a>
                    <a href="#ubicacion" class="hover:text-white transition">Ubicación</a>
                    <a href="#reseñas" class="hover:text-white transition">Reseñas</a>
                    <a href="#contactanos" class="hover:text-white transition">Contactanos</a>
                </nav>
            </div>
        </div>
    </footer>

    <!-- Estilos movidos a resources/css/landing.css -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();

        // Inicializar Swiper para promociones
        const promotionsSwiper = new Swiper('.promotions-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.promo-button-next',
                prevEl: '.promo-button-prev',
            },
            pagination: {
                el: '.promo-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 1.2,
                    spaceBetween: 16,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2.5,
                    spaceBetween: 24,
                },
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true,
            grabCursor: true,
            freeMode: false,
        });

        // Currency Converter with Real-Time Exchange Rate
        let exchangeRate = 20; // Valor por defecto
        let currentCurrency = 'MXN';

        const currencyButtons = document.querySelectorAll('.currency-btn');
        const prices = document.querySelectorAll('.product-price');

        // Fetch real-time exchange rate from API
        async function fetchExchangeRate() {
            try {
                // Usando exchangerate-api.com (gratuita, sin API key necesaria)
                const response = await fetch('https://open.exchangerate-api.com/v6/latest/MXN');
                const data = await response.json();
                
                if (data && data.rates && data.rates.USD) {
                    exchangeRate = 1 / data.rates.USD; // Convertir de MXN a USD
                    console.log(`Tipo de cambio actualizado: 1 USD = ${exchangeRate.toFixed(2)} MXN`);
                }
            } catch (error) {
                console.warn('No se pudo obtener el tipo de cambio. Usando valor por defecto:', exchangeRate);
                // Alternativa: API de Banco de México (requiere más configuración)
                // https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno
            }
        }

        function updatePrices(currency) {
            prices.forEach(priceElement => {
                const priceMXN = parseFloat(priceElement.dataset.priceMxn);
                const priceValue = priceElement.querySelector('.price-value');
                const currencyCode = priceElement.querySelector('.currency-code');

                if (currency === 'USD') {
                    const priceUSD = priceMXN / exchangeRate;
                    priceValue.textContent = priceUSD.toFixed(2);
                    currencyCode.textContent = 'USD';
                } else {
                    priceValue.textContent = new Intl.NumberFormat('es-MX').format(priceMXN);
                    currencyCode.textContent = 'MXN';
                }
            });
        }

        currencyButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                currencyButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');

                // Update currency
                currentCurrency = button.id === 'currency-usd' ? 'USD' : 'MXN';
                updatePrices(currentCurrency);
            });
        });

        // Fetch exchange rate on page load
        fetchExchangeRate();
    </script>
</body>

</html>