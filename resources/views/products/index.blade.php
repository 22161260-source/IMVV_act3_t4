@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="page-title mb-1">
            <i class="bi bi-box-seam me-2" style="color: var(--primary);"></i>Productos
        </h1>
        <p class="text-secondary mb-0">Gestiona tu catálogo de productos</p>
    </div>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Nuevo Producto
    </a>
</div>

{{-- Stats row --}}
<div class="row g-3 mb-4">
    <div class="col-sm-4">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: rgba(249, 168, 255,0.35); color: #c026d3;">
                    <i class="bi bi-box-seam-fill"></i>
                </div>
                <div>
                    <div class="text-secondary" style="font-size:0.8rem;">Total Productos</div>
                    <div style="font-size:1.5rem; font-weight:700; color:#c026d3;">{{ $products->total() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: rgba(249, 168, 255,0.35); color: #c026d3;">
                    <i class="bi bi-tag-fill"></i>
                </div>
                <div>
                    <div class="text-secondary" style="font-size:0.8rem;">Categorías</div>
                    <div style="font-size:1.5rem; font-weight:700; color:#c026d3;">{{ $products->pluck('category')->filter()->unique('id')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Products table --}}
<div class="card">
    <div class="card-header d-flex align-items-center px-4 py-3">
        <i class="bi bi-table me-2" style="color: var(--primary);"></i>
        <span class="fw-semibold">Catálogo de productos</span>
        <span class="badge ms-2" style="background: rgba(99,102,241,0.2); color: #a5b4fc;">
            {{ $products->firstItem() }}–{{ $products->lastItem() }} de {{ $products->total() }}
        </span>
    </div>
    <div class="card-body p-0">
        @if($products->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #475569;"></i>
                <p class="text-secondary mt-3 mb-0">No hay productos registrados.</p>
                <a href="{{ route('productos.create') }}" class="btn btn-primary mt-3">Crear el primero</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Etiquetas</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="ps-4 text-secondary" style="font-size:0.8rem;">{{ $product->id }}</td>
                                <td>
                                    <a href="{{ route('productos.show', $product) }}"
                                       class="product-name fw-semibold text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>
                                    <span class="fw-bold" style="color: #34d399;">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </td>
                                <td>
                                    @if($product->category)
                                        <span class="badge badge-category">
                                            <i class="bi bi-tag me-1"></i>{{ $product->category->name }}
                                        </span>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                </td>
                                <td>
                                    @forelse($product->tags as $tag)
                                        <span class="badge badge-tag me-1">{{ $tag->name }}</span>
                                    @empty
                                        <span class="text-secondary" style="font-size:0.8rem;">Sin etiquetas</span>
                                    @endforelse
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('productos.show', $product) }}"
                                           class="btn btn-sm btn-outline-light" title="Ver detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('productos.edit', $product) }}"
                                           class="btn btn-sm btn-outline-light" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('productos.destroy', $product) }}"
                                              onsubmit="return confirm('¿Eliminar «{{ $product->name }}»?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    @if($products->hasPages())
        <div class="card-footer d-flex justify-content-center py-3" style="background: transparent; border-top: 1px solid var(--border);">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
