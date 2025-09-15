@extends('layouts.dashboard')

@section('title', 'Nuevo Producto | MoLi Café')

@section('content')
  <div class="mb-3">
      <a class="btn ghost" href="{{ route('products.index') }}">← Volver al listado</a>
  </div>

  <h1 class="mb-3">Nuevo Producto</h1>

  @if ($errors->any())
    <div class="alert error">
      <strong>Revisa los errores:</strong>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-field">
        <label class="label" for="product_name">Nombre</label>
        <input class="input" id="product_name" type="text" name="product_name" value="{{ old('product_name') }}" required>
      </div>
      <div class="form-field">
        <label class="label" for="description">Descripción</label>
        <textarea class="textarea" id="description" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <div class="form-field">
        <label class="label" for="price">Precio</label>
        <input class="input" id="price" type="number" name="price" value="{{ old('price', 0) }}" min="0" step="0.01" required>
      </div>
      <div class="form-field">
        <label class="label" for="category_id">Categoría</label>
        <select class="select" id="category_id" name="category_id" required>
          <option value="">-- Seleccionar --</option>
          @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-field">
        <label class="checkbox" for="available">
          <input id="available" type="checkbox" name="available" value="1" @checked(old('available'))>
          <span>Disponible</span>
        </label>
      </div>
      <div class="form-field">
        <label class="label">Imagen del producto</label>
        <div id="product-dropzone" class="dropzone"></div>
        <input type="hidden" name="image_path" id="image_path" value="{{ old('image_path') }}">
        <p class="help">Formatos permitidos: JPG, PNG, WEBP. Máx 2MB.</p>
      </div>
      <div>
        <button class="btn" type="submit">Guardar</button>
      </div>
    </form>
  </div>
@endsection

@push('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
  <style>
    .dropzone { border: 2px dashed #8b5e34; padding: 1rem; border-radius: 8px; background: #faf7f2; }
    .dz-image img { width: 100%; height: auto; }
  </style>
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
  <script>
    Dropzone.autoDiscover = false;
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const existing = "{{ old('image_path') ? asset('storage/' . old('image_path')) : '' }}";

    const dz = new Dropzone('#product-dropzone', {
      url: "{{ route('products.upload') }}",
      headers: { 'X-CSRF-TOKEN': csrf },
      maxFiles: 1,
      acceptedFiles: 'image/jpeg,image/png,image/webp',
      addRemoveLinks: true,
      dictDefaultMessage: 'Suelta una imagen aquí o haz clic para subir',
      init: function() {
        // Si hay imagen previa (tras validación fallida), mostrarla
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
