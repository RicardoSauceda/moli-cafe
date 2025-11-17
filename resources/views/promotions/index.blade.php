@extends('layouts.dashboard')

@section('title', 'Promociones | MoLi Café')

@section('content')
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Gestión de Promociones</h1>
                <p class="text-gray-600 mt-1">Administra todas las promociones del landing page</p>
            </div>
            <a href="{{ route('promotions.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                <i class="fas fa-plus"></i> Nueva Promoción
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-xl border border-green-200 bg-green-50 text-green-800">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if ($promotions->count() > 0)
        <!-- Tabla de Promociones -->
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Título</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Descuento</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Validez</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Estado</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($promotions as $promotion)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($promotion->image_path)
                                        <img src="{{ Storage::url($promotion->image_path) }}" 
                                             alt="{{ $promotion->title }}" 
                                             class="w-10 h-10 rounded object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-sm"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-sm">{{ $promotion->title }}</h3>
                                        <p class="text-xs text-gray-500">{{ Str::limit($promotion->description, 40) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-moli-yellow text-moli-black">
                                    {{ $promotion->getDiscountBadge() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $promotion->getValidityText() }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($promotion->is_active)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span> Activa
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                        <span class="w-2 h-2 bg-gray-500 rounded-full mr-2"></span> Inactiva
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <form action="{{ route('promotions.toggle-active', $promotion) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="text-sm font-medium transition hover:text-moli-yellow"
                                                title="{{ $promotion->is_active ? 'Desactivar' : 'Activar' }}">
                                            <i class="fas {{ $promotion->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('promotions.edit', $promotion) }}" 
                                       class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('¿Eliminar esta promoción?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-gray-600 hover:text-red-600 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- Estado Vacío -->
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-12 text-center">
            <i class="fas fa-tag text-4xl text-gray-300 mb-4 block"></i>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No hay promociones</h3>
            <p class="text-gray-600 mb-6">Comienza creando tu primera promoción para el landing page</p>
            <a href="{{ route('promotions.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                <i class="fas fa-plus"></i> Crear Primera Promoción
            </a>
        </div>
    @endif
@endsection
