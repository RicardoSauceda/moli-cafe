@extends('layouts.dashboard')

@section('title', 'Dashboard | MoLi Café')

@section('content')
    <div class="mb-5">
        <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">MoLi Café — Dashboard</h1>
        <p class="m-0 text-gray-500">Bienvenido, {{ $user->name ?? 'Usuario' }}</p>
    </div>

    <div class="grid gap-4 sm:gap-6 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
        {{-- Gestión de Catálogo --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
            <h2 class="text-lg font-semibold">Catálogo — Categorías</h2>
            <p class="text-gray-600">Gestiona las categorías de productos.</p>
            <div class="mt-3 flex flex-wrap gap-2">
                <a class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50" href="{{ route('categories.index') }}">Ver categorías</a>
                <a class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20" href="{{ route('categories.create') }}">Nueva categoría</a>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
            <h2 class="text-lg font-semibold">Catálogo — Productos</h2>
            <p class="text-gray-600">Agrega y administra los productos de tu carta.</p>
            <div class="mt-3 flex flex-wrap gap-2">
                <a class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50" href="{{ route('products.index') }}">Ver productos</a>
                <a class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20" href="{{ route('products.create') }}">Nuevo producto</a>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
            <h2 class="text-lg font-semibold">Promociones</h2>
            <p class="text-gray-600">Agrega y administra las promociones de tu landing page.</p>
            <div class="mt-3 flex flex-wrap gap-2">
                <a class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50"
                    href="{{ route('promotions.index') }}">Ver promociones</a>
                <a class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20"
                    href="{{ route('promotions.create') }}">Nueva promoción</a>
            </div>
        </div>

        {{-- Configuración y Usuarios --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
            <h2 class="text-lg font-semibold">Configuración — Opciones del menú</h2>
            <p class="text-gray-600">Modifica las opciones basadas en el seeder (PDF, puntuación).</p>
            <div class="mt-3 flex flex-wrap gap-2">
                <a class="inline-flex items-center rounded-xl bg-white text-gray-700 font-semibold px-4 py-2 border border-gray-300 shadow-sm hover:bg-gray-50" href="{{ route('menu-options.index') }}">Modificar opciones</a>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
            <h2 class="text-lg font-semibold">Usuarios</h2>
            <p class="text-gray-600">Crea, edita y elimina usuarios.</p>
            <div class="mt-3 flex flex-wrap gap-2">
                <a class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50" href="{{ route('users.index') }}">Ver usuarios</a>
                <a class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20" href="{{ route('users.create') }}">Nuevo usuario</a>
            </div>
        </div>
    </div>
@endsection