@extends('layouts.dashboard')

@section('title', 'Editar Promoción | MoLi Café')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-3 mb-4">
        <a href="{{ route('promotions.index') }}" class="text-gray-600 hover:text-gray-900 transition">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Editar Promoción</h1>
    </div>
    <p class="text-gray-600">{{ $promotion->title }}</p>
</div>

<form action="{{ route('promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Columna Izquierda: Campos de Texto -->
        <div class="space-y-6">
            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">
                    Título <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" name="title" 
                       value="{{ old('title', $promotion->title) }}"
                       class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition" required>
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                    Descripción <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">{{ old('description', $promotion->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipo de Promoción -->
            <div>
                <label for="promotion_type" class="block text-sm font-semibold text-gray-900 mb-2">
                    Tipo de Descuento <span class="text-red-500">*</span>
                </label>
                <select id="promotion_type" name="promotion_type" 
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition" 
                        required onchange="updateDiscountFields()">
                    <option value="">-- Selecciona --</option>
                    <option value="percentage" {{ old('promotion_type', $promotion->promotion_type) === 'percentage' ? 'selected' : '' }}>Porcentaje (%)</option>
                    <option value="fixed_amount" {{ old('promotion_type', $promotion->promotion_type) === 'fixed_amount' ? 'selected' : '' }}>Monto Fijo ($)</option>
                    <option value="special_price" {{ old('promotion_type', $promotion->promotion_type) === 'special_price' ? 'selected' : '' }}>Precio Especial ($)</option>
                </select>
                @error('promotion_type')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campos de Descuento Dinámicos -->
            <div id="discount_percentage_field" style="display: {{ old('promotion_type', $promotion->promotion_type) === 'percentage' ? 'block' : 'none' }};">
                <label for="discount_percentage" class="block text-sm font-semibold text-gray-900 mb-2">
                    Descuento (%) <span class="text-red-500">*</span>
                </label>
                <input type="number" id="discount_percentage" name="discount_percentage" 
                       value="{{ old('discount_percentage', $promotion->discount_percentage) }}" min="0" max="100" step="0.01"
                       class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                @error('discount_percentage')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div id="discount_amount_field" style="display: {{ old('promotion_type', $promotion->promotion_type) === 'fixed_amount' ? 'block' : 'none' }};">
                <label for="discount_amount" class="block text-sm font-semibold text-gray-900 mb-2">
                    Monto Descuento ($) <span class="text-red-500">*</span>
                </label>
                <input type="number" id="discount_amount" name="discount_amount" 
                       value="{{ old('discount_amount', $promotion->discount_amount) }}" min="0" step="0.01"
                       class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                @error('discount_amount')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div id="price_field" style="display: {{ old('promotion_type', $promotion->promotion_type) === 'special_price' ? 'block' : 'none' }};">
                <label for="price" class="block text-sm font-semibold text-gray-900 mb-2">
                    Precio Especial ($) <span class="text-red-500">*</span>
                </label>
                <input type="number" id="price" name="price" 
                       value="{{ old('price', $promotion->price) }}" min="0" step="0.01"
                       class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Columna Derecha: Imagen y Fechas -->
        <div class="space-y-6">
            <!-- Imagen -->
            <div>
                <label for="image_path" class="block text-sm font-semibold text-gray-900 mb-2">
                    Imagen de Promoción
                </label>
                @if ($promotion->image_path)
                    <div class="mb-4 p-4 rounded-xl bg-gray-50 border border-gray-200">
                        <p class="text-sm text-gray-600 mb-2">Imagen actual:</p>
                        <img src="{{ Storage::url($promotion->image_path) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover rounded-lg">
                    </div>
                @endif
                <div class="relative">
                    <input type="file" id="image_path" name="image_path" accept="image/*"
                           class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-moli-yellow file:text-moli-black hover:file:brightness-95 cursor-pointer"
                           onchange="previewImage(event)">
                </div>
                @error('image_path')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                
                <!-- Preview -->
                <div id="image_preview" class="mt-4 hidden">
                    <img id="preview_img" src="" alt="Preview" class="w-full h-48 object-cover rounded-xl border border-gray-200">
                </div>
            </div>

            <!-- Validez: Uso de Fechas o Descripción -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">
                    Período de Validez
                </label>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="validity_fixed" name="validity_type" value="fixed" 
                               {{ old('validity_type', $promotion->validity_end ? 'fixed' : 'seasonal') === 'fixed' ? 'checked' : '' }}
                               onchange="toggleValidityType()">
                        <label for="validity_fixed" class="text-sm text-gray-700 cursor-pointer">Fechas Específicas</label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="radio" id="validity_seasonal" name="validity_type" value="seasonal"
                               {{ old('validity_type', $promotion->validity_end ? 'fixed' : 'seasonal') === 'seasonal' ? 'checked' : '' }}
                               onchange="toggleValidityType()">
                        <label for="validity_seasonal" class="text-sm text-gray-700 cursor-pointer">Texto Personalizado (Ej: Temporada)</label>
                    </div>
                </div>
            </div>

            <!-- Fechas -->
            <div id="validity_date_section" style="display: {{ old('validity_type', $promotion->validity_end ? 'fixed' : 'seasonal') === 'fixed' ? 'block' : 'none' }};" class="space-y-4">
                <div>
                    <label for="validity_start" class="block text-sm font-semibold text-gray-900 mb-2">
                        Fecha de Inicio
                    </label>
                    <input type="datetime-local" id="validity_start" name="validity_start" 
                           value="{{ old('validity_start', $promotion->validity_start?->format('Y-m-d\TH:i')) }}"
                           class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                    @error('validity_start')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="validity_end" class="block text-sm font-semibold text-gray-900 mb-2">
                        Fecha de Fin
                    </label>
                    <input type="datetime-local" id="validity_end" name="validity_end" 
                           value="{{ old('validity_end', $promotion->validity_end?->format('Y-m-d\TH:i')) }}"
                           class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                    @error('validity_end')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Descripción de Validez -->
            <div id="validity_description_section" style="display: {{ old('validity_type', $promotion->validity_end ? 'fixed' : 'seasonal') === 'seasonal' ? 'block' : 'none' }};">
                <label for="validity_description" class="block text-sm font-semibold text-gray-900 mb-2">
                    Descripción de Validez
                </label>
                <input type="text" id="validity_description" name="validity_description" 
                       value="{{ old('validity_description', $promotion->validity_description) }}"
                       placeholder="Ej: Todo el verano, Solo fines de semana"
                       class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:border-moli-yellow focus:ring-4 focus:ring-yellow-300/20 outline-none transition">
                @error('validity_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estado -->
            <div>
                <label for="is_active" class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="is_active" name="is_active" value="1" 
                           {{ old('is_active', $promotion->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 rounded border-gray-300 text-moli-yellow focus:ring-2 focus:ring-yellow-500">
                    <span class="text-sm font-semibold text-gray-900">Promoción Activa</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Botones -->
    <div class="flex items-center gap-4 mt-8">
        <button type="submit" class="px-6 py-2 rounded-xl bg-moli-yellow text-moli-black font-bold border border-yellow-300 shadow-sm hover:brightness-95 focus:outline-none focus:ring-4 focus:ring-yellow-300/50 transition">
            <i class="fas fa-save mr-2"></i> Guardar Cambios
        </button>
        <a href="{{ route('promotions.index') }}" class="px-6 py-2 rounded-xl border border-gray-300 bg-gray-100 text-gray-900 font-semibold hover:bg-gray-200 transition">
            Cancelar
        </a>
    </div>
</form>

<script>
    function updateDiscountFields() {
        const type = document.getElementById('promotion_type').value;
        document.getElementById('discount_percentage_field').style.display = type === 'percentage' ? 'block' : 'none';
        document.getElementById('discount_amount_field').style.display = type === 'fixed_amount' ? 'block' : 'none';
        document.getElementById('price_field').style.display = type === 'special_price' ? 'block' : 'none';
    }

    function toggleValidityType() {
        const isFixed = document.getElementById('validity_fixed').checked;
        document.getElementById('validity_date_section').style.display = isFixed ? 'block' : 'none';
        document.getElementById('validity_description_section').style.display = isFixed ? 'none' : 'block';
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_img').src = e.target.result;
                document.getElementById('image_preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
