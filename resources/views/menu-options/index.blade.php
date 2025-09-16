@extends('layouts.dashboard')

@section('title', 'Opciones de Menú | MoLi Café')

@section('content')
    <div class="mb-5">
        <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">Opciones de Menú</h1>
        <p class="m-0 text-gray-500">Configura el comportamiento del menú.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800 border border-green-200">{{ session('status') }}</div>
    @endif

    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-4 py-3"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($options as $option)
                <tr>
                    <td class="px-4 py-3">{{ $option->option_name }}</td>
                    <td class="px-4 py-3">
                        @if($option->status)
                            <span class="inline-flex items-center rounded-full bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 border border-green-200">Activo</span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 border border-gray-200">Inactivo</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('menu-options.edit', $option) }}" class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-3 py-1.5 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
