@extends('layouts.dashboard')

@section('title', 'Productos | MoLi Café')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">Productos</h1>
    <div class="flex gap-2">
        <a href="{{ route('products.create') }}"
            class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
            Nuevo producto
        </a>
    </div>
</div>

<div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-3 sm:p-4 mb-6">
    @php
        $currentQ = old('q', $q ?? request('q'));
        $currentCategory = old('category_id', $categoryId ?? request('category_id'));
        $currentAvailability = old('availability', (string) ($availability ?? request('availability')));
    @endphp
    <form method="GET" action="{{ route('products.index') }}" class="space-y-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 items-end">
            <div class="space-y-1">
                <label class="block text-sm font-semibold text-gray-700" for="q">Buscar</label>
                <input id="q" type="text" name="q" value="{{ $currentQ }}" placeholder="Nombre o descripción..."
                    class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-4 focus:ring-yellow-300/40 focus:border-yellow-400" />
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-semibold text-gray-700" for="category_id">Categoría</label>
                <select id="category_id" name="category_id" class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 focus:ring-yellow-300/40 focus:border-yellow-400">
                    <option value="">Todas</option>
                    @foreach(($categories ?? []) as $c)
                    @php 
                        $cId = data_get($c, 'id');
                        $cName = data_get($c, 'name');
                    @endphp
                    <option value="{{ $cId }}" {{ (string) $currentCategory === (string) $cId ? 'selected' : '' }}>
                        {{ $cName }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-semibold text-gray-700" for="availability">Disponibilidad</label>
                <select id="availability" name="availability"
                    class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 focus:ring-yellow-300/40 focus:border-yellow-400">
                    <option value="">Todas</option>
                    <option value="1" {{ (string) $currentAvailability === '1' ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ (string) $currentAvailability === '0' ? 'selected' : '' }}>No disponible</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                    Aplicar
                </button>
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20">
                    Limpiar
                </a>
            </div>
        </div>
    </form>
</div>

@if ($products->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
        @foreach ($products as $p)
            @php
                $img = $p->image_path ? asset('storage/' . $p->image_path) : asset('img/coffee-not-found.png');
            @endphp
            <article class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden flex flex-col">
                <div class="aspect-[4/3] bg-gray-100 grid place-items-center overflow-hidden">
                    <img src="{{ $img }}" alt="{{ $p->product_name }}" class="w-full h-full object-cover"
                        onerror="this.onerror=null;this.src='{{ asset('img/coffee-not-found.png') }}'" />
                </div>
                <div class="p-3 sm:p-4 flex flex-col gap-2">
                    <h3 class="text-base font-semibold text-gray-900 m-0">{{ $p->product_name }}</h3>
                    <div class="text-sm text-gray-500">{{ $p->category->name ?? 'Sin categoría' }}</div>
                    <div class="flex items-center justify-between mt-1">
                        <span class="font-semibold text-[#8b5e34]">${{ number_format($p->price, 2) }}</span>
                        @php $isAv = (bool) $p->available; @endphp
                        <span
                            class="text-sm font-medium {{ $isAv ? 'text-green-600' : 'text-red-600' }}">{{ $isAv ? 'Disponible' : 'No disponible' }}</span>
                    </div>
                    <div class="mt-2 grid grid-cols-[3fr_1fr] gap-2">
                        <a href="{{ route('products.edit', $p) }}"
                            class="inline-flex items-center gap-1.5 rounded-lg bg-moli-yellow text-moli-black font-semibold px-3 py-2 text-sm border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                            <span aria-hidden="true">
                               <i class="fas fa-edit text-moli-black"></i>
                            </span>
                            <span>Editar</span>
                        </a>
                        <form method="POST" action="{{ route('products.destroy', $p) }}"
                            onsubmit="return confirm('¿Eliminar producto? Esta acción no se puede deshacer.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Eliminar" aria-label="Eliminar"
                                class="inline-flex items-center justify-center rounded-lg bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 px-3 py-2 text-sm">
                                <span aria-hidden="true">
                                    <i class="fas fa-trash-alt text-red-700"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@else
    @php $hasFilters = ($currentQ || $currentCategory || $currentAvailability !== ''); @endphp
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-3 sm:p-4">
        {{ $hasFilters ? 'No se encontraron productos con los filtros aplicados.' : 'Sin productos todavía.' }}
    </div>
@endif

<div class="mt-4">
    {{ $products->links('vendor.pagination.moli') }}
</div>
@endsection