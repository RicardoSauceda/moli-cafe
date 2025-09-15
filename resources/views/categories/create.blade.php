@extends('layouts.dashboard')

@section('title', 'Nueva Categoría | MoLi Café')

@section('content')
  <div class="mb-4">
    <a class="inline-flex items-center rounded-lg bg-white text-moli-black font-semibold px-3 py-2 text-sm border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-900/10" href="{{ route('categories.index') }}">← Volver al listado</a>
  </div>

  <h1 class="mb-4 text-xl sm:text-2xl font-extrabold text-gray-900">Nueva Categoría</h1>

  @if ($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 text-red-800 px-3 py-2">
      <strong class="font-semibold">Revisa los errores:</strong>
      <ul class="list-disc pl-5 mt-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-4">
    <form method="POST" action="{{ route('categories.store') }}">
      @csrf
      <div class="mb-3">
        <label class="block text-sm font-semibold text-gray-700" for="name">Nombre</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required
               class="mt-1 block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 focus:ring-yellow-300/40 focus:border-yellow-400" />
      </div>
      <div>
        <button type="submit" class="inline-flex items-center rounded-xl bg-moli-yellow text-moli-black font-bold px-4 py-2 border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50">Guardar</button>
      </div>
    </form>
  </div>
@endsection
