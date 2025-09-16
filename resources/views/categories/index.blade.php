@extends('layouts.dashboard')

@section('title', 'Categorías | MoLi Café')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">Categorías</h1>
        <div class="flex gap-2">
            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                Nueva categoría
            </a>
        </div>
    </div>

    @if ($categories->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
            @foreach ($categories as $c)
                <article class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden flex flex-col">
                    <div class="p-3 sm:p-4 flex flex-col gap-2">
                        <h3 class="text-base font-semibold text-gray-900 m-0">{{ $c->name }}</h3>
                        <div class="text-sm text-gray-500">ID #{{ $c->id }} · {{ $c->created_at->format('Y-m-d') }}</div>
                        <div class="mt-2 grid grid-cols-[3fr_1fr] gap-2">
                            <a href="{{ route('categories.edit', $c) }}"
                               class="inline-flex items-center gap-1.5 rounded-lg bg-moli-yellow text-moli-black font-semibold px-3 py-2 text-sm border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">
                                <span aria-hidden="true">
                                    <i class="fas fa-edit text-moli-black"></i>
                                </span>
                                <span>Editar</span>
                            </a>
                            <form class="flex justify-end" method="POST" action="{{ route('categories.destroy', $c) }}" onsubmit="return confirm('¿Eliminar categoría? Esta acción no se puede deshacer.');">
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
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-3 sm:p-4">Sin categorías todavía.</div>
    @endif

    <div class="mt-4">
            {{ $categories->links('vendor.pagination.moli') }}
    </div>
@endsection

@push('head')
@endpush
