@extends('layouts.dashboard')

@section('title', 'Editar Opción | MoLi Café')

@section('content')
    <div class="mb-5">
        <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">Editar opción</h1>
        <p class="m-0 text-gray-500">Actualiza el nombre y estado de la opción.</p>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4 max-w-xl">
        <form method="POST" action="{{ route('menu-options.update', $menuOption) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre de la opción</label>
                <input type="text" name="option_name" value="{{ old('option_name', $menuOption->option_name) }}" class="mt-1 block w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900" required />
                @error('option_name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="status" class="mt-1 block w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                    <option value="1" @selected(old('status', $menuOption->status))>Activo</option>
                    <option value="0" @selected(!old('status', $menuOption->status))>Inactivo</option>
                </select>
                @error('status')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-2">
                <button class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50" type="submit">Guardar cambios</button>
                <a href="{{ route('menu-options.index') }}" class="inline-flex items-center rounded-xl bg-white text-gray-700 font-semibold px-4 py-2 border border-gray-300 shadow-sm hover:bg-gray-50">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
