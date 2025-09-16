@extends('layouts.dashboard')

@section('title', 'Usuarios | MoLi Café')

@section('content')
    <div class="mb-5">
        <h1 class="m-0 text-xl sm:text-2xl font-extrabold text-gray-900">Usuarios</h1>
        <p class="m-0 text-gray-500">Administra los usuarios del sistema.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-md bg-green-50 p-3 text-green-800 border border-green-200">{{ session('status') }}</div>
    @endif

    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="inline-flex items-center rounded-xl bg-gray-900 text-white font-semibold px-4 py-2 border border-gray-900 shadow-sm hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-gray-900/20">Nuevo usuario</a>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-4 py-3"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center rounded-xl bg-white text-gray-700 font-semibold px-3 py-1.5 border border-gray-300 shadow-sm hover:bg-gray-50">Editar</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center rounded-xl bg-red-600 text-white font-semibold px-3 py-1.5 border border-red-600 shadow-sm hover:brightness-110">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>
@endsection
