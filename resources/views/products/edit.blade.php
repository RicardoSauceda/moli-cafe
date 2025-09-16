@extends('layouts.dashboard')

@section('title', 'Editar Producto | MoLi Café')

@section('content')

    <div class="max-w-2xl mx-auto px-4 sm:px-6">
        <!-- Header minimalista -->
        <div class="mb-6 text-left">
            <h1 class="text-2xl font-bold mb-1" style="color: #262020;">
                Editar Producto
            </h1>
            <p class="text-sm text-gray-600">Actualiza la información del producto</p>
        </div>

        <!-- Form Card minimalista -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden"
            style="box-shadow: 0 4px 15px rgba(38, 32, 32, 0.1);">
            <!-- Simple header -->
            <div class="bg-zinc-900 px-6 py-4">
                <h2 class="text-lg font-semibold text-moli-yellow flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Información del Producto
                </h2>
            </div>

            <!-- Contenido del formulario -->
            <div class="p-6">
                <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Información básica - Grid de 2 columnas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombre del producto -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;" for="product_name">
                                Nombre del producto
                            </label>
                            <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="Nombre del producto"
                                required />
                            @error('product_name')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;" for="price">
                                Precio
                            </label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" min="0" step="0.01"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" placeholder="0.00"
                                required />
                            @error('price')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #262020;" for="description">
                            Descripción <span class="text-xs text-gray-400">(opcional)</span>
                        </label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors resize-none"
                            style="border-color: #d1d5db; color: #262020;" placeholder="Describe las características del producto">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Categoría y disponibilidad -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Categoría -->
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #262020;" for="category_id">
                                Categoría
                            </label>
                            <select name="category_id" id="category_id"
                                class="w-full px-3 py-2 bg-gray-50 border rounded-lg focus:ring-2 focus:ring-moli-yellow focus:border-moli-yellow transition-colors"
                                style="border-color: #d1d5db; color: #262020;" required>
                                <option value="">-- Seleccionar categoría --</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}" @selected(old('category_id', $product->category_id)==$c->id)>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Disponibilidad -->
                        <div class="flex items-center pt-6">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="available" id="available" value="1" @checked(old('available', $product->available))
                                    class="w-4 h-4 text-moli-yellow bg-gray-100 border-gray-300 rounded focus:ring-moli-yellow focus:ring-2" />
                                <span class="ml-2 text-sm font-medium" style="color: #262020;">
                                    Producto disponible
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Imagen del producto -->
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #262020;">
                            Imagen del producto <span class="text-xs text-gray-400">(opcional)</span>
                        </label>
                        <div id="product-dropzone" class="dropzone border-2 border-dashed rounded-lg p-4 text-center transition-colors"
                            style="border-color: #d1d5db; background-color: #f9fafb;">
                        </div>
                        <input type="hidden" name="image_path" id="image_path" value="{{ old('image_path', $product->image_path) }}">
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fas fa-info-circle mr-1"></i>
                            Formatos permitidos: JPG, PNG, WEBP. Tamaño máximo: 2MB
                        </p>
                    </div>

                    <!-- Action Buttons minimalistas -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-6">
                        <button type="submit"
                            class="flex-1 px-4 py-2.5 bg-moli-yellow text-moli-black font-semibold rounded-lg hover:bg-yellow-400 focus:ring-2 focus:ring-moli-yellow focus:ring-offset-2 transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Actualizar Producto
                        </button>
                        <a href="{{ route('products.index') }}"
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

@push('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
  <style>
    .dropzone { 
      border: 2px dashed #d1d5db !important; 
      padding: 1.5rem; 
      border-radius: 8px; 
      background: #f9fafb !important;
      transition: all 0.2s ease;
    }
    .dropzone:hover { 
      border-color: #fff000 !important; 
      background: #fffbeb !important; 
    }
    .dropzone.dz-drag-hover { 
      border-color: #fff000 !important; 
      background: #fffbeb !important; 
    }
    .dz-image img { 
      width: 100%; 
      height: auto; 
      border-radius: 6px; 
    }
    .dz-message { 
      color: #6b7280; 
      font-size: 0.875rem; 
    }
    .dz-remove { 
      color: #ef4444 !important; 
      font-size: 0.75rem; 
    }
  </style>
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
  <script>
    Dropzone.autoDiscover = false;
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const existing = "{{ old('image_path', $product->image_path) ? asset('storage/' . old('image_path', $product->image_path)) : '' }}";

    const dz = new Dropzone('#product-dropzone', {
      url: "{{ route('products.upload') }}",
      headers: { 'X-CSRF-TOKEN': csrf },
      maxFiles: 1,
      acceptedFiles: 'image/jpeg,image/png,image/webp',
      addRemoveLinks: true,
      dictDefaultMessage: 'Suelta una imagen aquí o haz clic para subir',
      init: function() {
        if (existing) {
          const mock = { name: 'imagen', size: 0 };
          this.emit('addedfile', mock);
          this.emit('thumbnail', mock, existing);
          this.emit('complete', mock);
          this.files.push(mock);
        }
      }
    });

    dz.on('success', function(file, response) {
      document.getElementById('image_path').value = response.path;
    });

    dz.on('removedfile', function() {
      document.getElementById('image_path').value = '';
    });

    dz.on('error', function(file, message) {
      console.error(message);
    });
  </script>
@endpush
