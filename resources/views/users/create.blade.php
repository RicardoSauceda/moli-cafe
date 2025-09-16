@extends('layouts.dashboard')

@section('title', 'Nuevo Usuario | MoLi Café')

@section('content')

    <div class="max-w-2xl mx-auto px-4 sm:px-6">
        <!-- Header minimalista -->
        <div class="mb-6 text-left">
            <h1 class="text-2xl font-bold mb-1" style="color: #262020;">
                Nuevo Usuario
            </h1>
            <p class="text-sm text-gray-600">Completa los datos para crear un nuevo usuario</p>
        </div>

        <!-- Form Card minimalista -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden"
            style="box-shadow: 0 4px 15px rgba(38, 32, 32, 0.1);">
            <!-- Simple header -->
            <div class="bg-zinc-900 px-6 py-4">
                <h2 class="text-lg font-semibold text-moli-yellow flex items-center">
                    <i class="fas fa-user-plus mr-2"></i>
                    Información del Usuario
                </h2>
            </div>

            <!-- Contenido del formulario -->
            <div class="p-6">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-5">
                    @csrf

                    <!-- Información personal - Grid de 2 columnas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Nombre
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="Nombre"
                                required />
                            @error('name')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Segundo nombre -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Segundo nombre <span class="text-xs text-gray-400">(opcional)</span>
                            </label>
                            <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="Segundo nombre" />
                            @error('middle_name')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Apellidos y fecha de nacimiento -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Apellidos -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Apellidos
                            </label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="Apellidos"
                                required />
                            @error('last_name')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Fecha de nacimiento <span class="text-xs text-gray-400">(opcional)</span>
                            </label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" />
                            @error('birth_date')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #262020;">
                            Correo electrónico
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                            style="border-color: #d1d5db; color: #262020;" placeholder="correo@molicafe.com" required />
                        @error('email')
                            <p class="text-red-600 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Divider simple -->
                    <div class="border-t border-gray-200 pt-4">
                        <p class="text-sm font-medium mb-3" style="color: #262020;">
                            Contraseña del usuario
                        </p>
                    </div>

                    <!-- Contraseñas en grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Contraseña -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Contraseña
                            </label>
                            <input type="password" name="password"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;"
                                placeholder="Contraseña" required />
                            @error('password')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Confirmar contraseña -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;">
                                Confirmar contraseña
                            </label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="Confirmar" required />
                        </div>
                    </div>

                    <!-- Action Buttons minimalistas -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-6">
                        <button type="submit"
                            class="flex-1 px-4 py-2.5 bg-moli-yellow text-moli-black font-semibold rounded-lg hover:bg-yellow-400 focus:ring-2 focus:ring-moli-yellow focus:ring-offset-2 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Crear Usuario
                        </button>
                        <a href="{{ route('users.index') }}"
                            class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition-colors text-center">
                            <i class="fas fa-times mr-2"></i>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
