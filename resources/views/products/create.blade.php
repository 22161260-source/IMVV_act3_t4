@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item">
                <a href="{{ route('productos.index') }}" class="text-decoration-none" style="color: #6366f1;">
                    <i class="bi bi-box-seam me-1"></i>Productos
                </a>
            </li>
            <li class="breadcrumb-item active" style="color: #94a3b8;">Nuevo producto</li>
        </ol>
    </nav>
    <h1 class="page-title">
        <i class="bi bi-plus-circle me-2" style="color: var(--primary);"></i>Crear Producto
    </h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header px-4 py-3">
                <span class="fw-semibold"><i class="bi bi-form me-2"></i>Información del producto</span>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('productos.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del producto <span style="color:#ef4444;">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Ej. Auriculares Sony WH-1000XM5" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea id="description" name="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Descripción breve del producto...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Precio (MXN) <span style="color:#ef4444;">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: rgba(30,41,59,0.8); border-color: var(--border); color: #94a3b8;">$</span>
                                <input type="number" id="price" name="price" step="0.01" min="0"
                                       class="form-control @error('price') is-invalid @enderror"
                                       value="{{ old('price') }}" placeholder="0.00" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Categoría <span style="color:#ef4444;">*</span></label>
                            <select id="category_id" name="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="" disabled selected>— Selecciona una —</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-block mb-2">Etiquetas (muchos a muchos)</label>
                        <div class="p-3 rounded check-group" style="background: rgba(15,23,42,0.5); border: 1px solid var(--border);">
                            @if($tags->isEmpty())
                                <p class="text-secondary mb-0" style="font-size:0.85rem;">No hay etiquetas disponibles.</p>
                            @else
                                <div class="row g-1">
                                    @foreach($tags as $tag)
                                        <div class="col-sm-6 col-md-4">
                                            <label class="mb-0">
                                                <input class="form-check-input" type="checkbox"
                                                       name="tags[]" value="{{ $tag->id }}"
                                                       {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                                <span>{{ $tag->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @error('tags')
                            <div class="text-danger mt-1" style="font-size:0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-2"></i>Guardar Producto
                        </button>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-light px-4">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
