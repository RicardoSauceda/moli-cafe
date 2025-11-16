<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'MoLi Café')</title>
        <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('head')
</head>

<body class="bg-white text-moli-black antialiased">
    <header class="sticky top-0 z-40 bg-white/85 backdrop-blur border-b border-gray-200">
        <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-3">
            <a href="/" class="font-extrabold tracking-tight">MoLi Café</a>
            <div class="hidden sm:flex items-center gap-4 text-sm font-medium">
                <a class="hover:text-moli-yellow" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="hover:text-moli-yellow" href="{{ route('categories.index') }}">Categorías</a>
                <a class="hover:text-moli-yellow" href="{{ route('products.index') }}">Productos</a>
            </div>
            <div class="flex items-center gap-2">
                @auth
                    <span class="bg-black text-white border border-gray-200 rounded-full px-3 py-1 text-sm">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="inline-flex items-center rounded-lg bg-gray-900 text-white font-semibold px-3 py-2 text-sm border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20" type="submit">Cerrar sesión</button>
                    </form>
                @endauth
                @guest 
                    <a class="inline-flex items-center rounded-lg bg-gray-900 text-white font-semibold px-3 py-2 text-sm border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20" href="{{ route('login') }}">Iniciar sesión</a>
                @endguest
            </div>
        </nav>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-5">
        @if (session('status'))
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 text-green-800 px-3 py-2">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500 border-t border-gray-200">
        <p class="m-0">&copy; <span id="year"></span> MoLi Café</p>
    </footer>

    @stack('scripts')

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
