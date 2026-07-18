@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item">
                <a href="{{ route('productos.index') }}" class="text-decoration-none" style="color: #6366f1;">
                    <i class="bi bi-box-seam me-1"></i>Productos
                </a>
            </li>
            <li class="breadcrumb-item active" style="color: #94a3b8;">{{ Str::limit($product->name, 40) }}</li>
        </ol>
    </nav>
</div>

<div class="row g-4">
    {{-- Product details --}}
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center">
                <span class="fw-semibold"><i class="bi bi-info-circle me-2"></i>Detalle del producto</span>
                <div class="d-flex gap-2">
                    <a href="{{ route('productos.edit', $product) }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-pencil me-1"></i>Editar
                    </a>
                    <form method="POST" action="{{ route('productos.destroy', $product) }}"
                          onsubmit="return confirm('¿Eliminar «{{ $product->name }}»? Esta acción no se puede deshacer.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash me-1"></i>Eliminar
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body p-4">
                <h2 class="fw-bold mb-1" style="color: var(--secondary); font-size: 1.5rem;">{{ $product->name }}</h2>

                @if($product->description)
                    <p class="mt-3 mb-4" style="color: var(--text); line-height: 1.7;">{{ $product->description }}</p>
                @else
                    <p class="text-secondary mt-3 mb-4 fst-italic">Sin descripción.</p>
                @endif

                <div class="price-display mb-4">${{ number_format($product->price, 2) }} <small style="font-size:1rem; color: var(--muted);">MXN</small></div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="detail-label mb-1">Categoría (uno a muchos)</div>
                        @if($product->category)
                            <span class="badge badge-category fs-6">
                                <i class="bi bi-tag me-1"></i>{{ $product->category->name }}
                            </span>
                        @else
                            <span class="text-secondary">—</span>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <div class="detail-label mb-1">Registrado</div>
                        <div class="detail-value">{{ $product->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tags & sidebar --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header px-4 py-3">
                <span class="fw-semibold"><i class="bi bi-bookmark me-2"></i>Etiquetas (muchos a muchos)</span>
            </div>
            <div class="card-body p-4">
                @forelse($product->tags as $tag)
                    <span class="badge badge-tag fs-6 me-1 mb-1">{{ $tag->name }}</span>
                @empty
                    <p class="text-secondary mb-0" style="font-size:0.85rem;">Este producto no tiene etiquetas asignadas.</p>
                @endforelse
            </div>
        </div>

        {{-- Other products in same category --}}
        @if($product->category && $product->category->products->count() > 1)
            <div class="card">
                <div class="card-header px-4 py-3">
                    <span class="fw-semibold" style="font-size:0.9rem;">
                        <i class="bi bi-grid me-2"></i>Más en «{{ $product->category->name }}»
                    </span>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush" style="border-radius: 0 0 12px 12px;">
                        @foreach($product->category->products->where('id', '!=', $product->id)->take(5) as $related)
                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                style="background: transparent; border-color: var(--border); color: #94a3b8;">
                                <a href="{{ route('productos.show', $related) }}"
                                   class="text-decoration-none" style="color: var(--secondary); font-size:0.9rem; font-weight: 700;">
                                    {{ Str::limit($related->name, 25) }}
                                </a>
                                <span style="color: var(--muted); font-size:0.85rem;">${{ number_format($related->price, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('productos.index') }}" class="btn btn-outline-light">
        <i class="bi bi-arrow-left me-2"></i>Volver al listado
    </a>
</div>
@endsection
