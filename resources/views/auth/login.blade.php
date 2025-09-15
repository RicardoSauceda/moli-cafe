<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión — MoLi Café</title>
    <meta name="description" content="Accede a tu cuenta de MoLi Café" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Montserrat:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-moli-black antialiased selection:bg-moli-yellow selection:text-moli-black">
    <header class="sticky top-0 z-50 bg-transparent">
        <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-[4.5rem]">
                <a href="/" class="flex items-center gap-2 group">
                    <span class="text-white font-bold text-lg">MoLi Café</span>
                </a>
                <div class="hidden md:flex items-center gap-4">
                    <a href="/" class="text-white hover:text-moli-yellow transition">Inicio</a>
                </div>
                <button class="md:hidden text-white hover:text-moli-yellow transition p-2" aria-label="Abrir menú">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </nav>
    </header>

    <main class="relative -mt-[4.5rem] min-h-screen bg-zinc-900">
        <div class="absolute inset-0 pointer-events-none opacity-[0.05]" aria-hidden="true">
            <div class="w-full h-full"
                style="background-image: radial-gradient(transparent 1px,#fff000 1px), radial-gradient(transparent 1px,#fff000 1px); background-size: 24px 24px; background-position: 0 0,12px 12px;">
            </div>
        </div>

        <section class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-[4.5rem] pb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-stretch">
                <!-- Mitad imagen con overlay -->
                <div class="relative rounded-2xl overflow-hidden border border-[#fff000]/10 shadow-xl order-2 lg:order-1">
                    <img src="{{ asset('img/coffee-login.jpg') }}" alt="Taza de café caliente" class="w-full h-full object-cover min-h-[280px] sm:min-h-[340px] lg:min-h-[560px]">
                    <div class="absolute inset-0 bg-gradient-to-tr from-black/60 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8 text-white">
                        <h2 class="text-3xl sm:text-4xl font-extrabold" style="font-family: 'Amatic SC', cursive;">Bienvenido de vuelta</h2>
                        <p class="mt-2 text-sm sm:text-base text-neutral-200">Inicia sesión para continuar disfrutando de MoLi Café.</p>
                    </div>
                </div>

                <!-- Mitad formulario con glassmorphism -->
                <div class="relative order-1 lg:order-2">
                    <div class="rounded-2xl border border-yellow-200/20 bg-zinc-900/50 backdrop-blur-xl shadow-2xl p-5 sm:p-7 lg:p-8">
                        <div class="mb-6">
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-white" style="font-family: 'Amatic SC', cursive;">Iniciar sesión</h1>
                            <p class="text-neutral-300 text-sm sm:text-base mt-1">Accede con tus credenciales</p>
                        </div>

                        @if ($errors->any())
                            <div class="mb-4 rounded-lg border border-red-400/50 bg-red-500/10 text-red-200 p-3 text-sm">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm text-neutral-200 mb-1">Correo electrónico</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                                       class="w-full rounded-xl border border-neutral-700/40 bg-zinc-900/60 text-neutral-100 placeholder:text-neutral-400 px-3 py-2 outline-none focus:ring-4 focus:ring-yellow-300/20 focus:border-yellow-300"
                                       placeholder="tu@correo.com">
                            </div>
                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="password" class="block text-sm text-neutral-200 mb-1">Contraseña</label>
                                    <a href="#" class="text-xs text-neutral-300 hover:text-moli-yellow">¿Olvidaste tu contraseña?</a>
                                </div>
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                       class="w-full rounded-xl border border-neutral-700/40 bg-zinc-900/60 text-neutral-100 placeholder:text-neutral-400 px-3 py-2 outline-none focus:ring-4 focus:ring-yellow-300/20 focus:border-yellow-300"
                                       placeholder="••••••••">
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="inline-flex items-center gap-2 select-none text-neutral-300 text-sm">
                                    <input type="checkbox" name="remember" class="rounded border-neutral-600 bg-transparent text-[#fff000] focus:ring-0">
                                    <span>Recordarme</span>
                                </label>
                                <a href="/" class="text-xs text-neutral-300 hover:text-moli-yellow">Volver al inicio</a>
                            </div>

                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl border-2 border-moli-yellow bg-moli-yellow text-moli-black font-bold px-4 py-3 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/30">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Entrar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Efecto navbar al hacer scroll, reutilizando estilos de app.css
        const header = document.querySelector('header');
        const onScroll = () => {
            if (window.scrollY > 10) header.classList.add('scrolled');
            else header.classList.remove('scrolled');
        };
        onScroll();
        window.addEventListener('scroll', onScroll);
    </script>
</body>

</html>
