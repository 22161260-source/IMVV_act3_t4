<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de gestión de productos con categorías y etiquetas">
    <title>@yield('title', 'Gestión de Productos') — TiendaApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #d946ef;
            --primary-dark: #c026d3;
            --primary-light: #f5d0fe;
            --primary-lighter: #fdf2f8;
            --secondary: #ec4899;
            --danger: #be123c;
            --border: #f9a8dc;
            --text: #1f2937;
            --muted: #6b7280;
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            color: var(--text);
        }

        .navbar {
            background: #ffffff !important;
            border-bottom: 1px solid rgba(249, 168, 255, 0.4);
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.08);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary);
        }

        .nav-link {
            color: var(--muted) !important;
            font-weight: 600;
            transition: color 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-dark) !important;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid rgba(249, 168, 255, 0.7);
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(236, 72, 153, 0.08);
        }

        .card-header {
            background: rgba(251, 207, 232, 0.6);
            border-bottom: 1px solid rgba(249, 168, 255, 0.6);
            border-radius: 18px 18px 0 0 !important;
            color: var(--text);
        }

        .table {
            color: var(--text);
            --bs-table-bg: transparent;
            --bs-table-striped-bg: rgba(251, 207, 232, 0.4);
            --bs-table-hover-bg: rgba(236, 72, 153, 0.08);
            --bs-table-color: var(--text);
            --bs-table-border-color: rgba(249, 168, 255, 0.8);
        }

        .table thead th {
            background: rgba(236, 72, 153, 0.12) !important;
            color: var(--primary-dark);
            border-color: rgba(249, 168, 255, 0.8);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table tbody tr {
            background-color: transparent !important;
            border-color: rgba(249, 168, 255, 0.8);
            transition: background 0.15s;
        }

        .table tbody tr:hover {
            background-color: rgba(236, 72, 153, 0.08) !important;
        }

        .table td, .table th {
            vertical-align: middle;
            border-color: rgba(249, 168, 255, 0.8);
            background-color: transparent !important;
            color: var(--text);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            border: none;
            font-weight: 700;
            color: #ffffff;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 30px rgba(236, 72, 153, 0.25);
        }

        .btn-outline-light {
            border-color: rgba(236, 72, 153, 0.35);
            color: var(--primary-dark);
            font-weight: 700;
            background: rgba(248, 113, 185, 0.08);
        }

        .btn-outline-light:hover {
            background: rgba(236, 72, 153, 0.12);
            border-color: var(--secondary);
            color: var(--primary-dark);
        }

        .badge {
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-tag {
            background: rgba(251, 207, 232, 0.8);
            color: var(--primary-dark);
            border: 1px solid rgba(251, 207, 232, 0.95);
        }

        .badge-category {
            background: rgba(251, 209, 231, 0.8);
            color: var(--secondary);
            border: 1px solid rgba(251, 207, 232, 0.95);
        }

        .form-control, .form-select {
            background: #ffffff;
            border: 1px solid rgba(249, 168, 255, 0.7);
            color: var(--text);
            border-radius: 12px;
            transition: all 0.2s;
            box-shadow: inset 0 0 0 1px rgba(236, 72, 153, 0.08);
        }

        .form-control:focus, .form-select:focus {
            background: #ffffff;
            border-color: var(--secondary);
            color: var(--text);
            box-shadow: 0 0 0 4px rgba(251, 207, 232, 0.6);
        }

        .form-control::placeholder {
            color: #a855f7;
        }

        .form-label {
            color: var(--text);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .alert {
            border-radius: 15px;
            border: 1px solid rgba(251, 207, 232, 0.9);
            background: rgba(253, 242, 248, 0.9);
        }

        .alert-success {
            background: rgba(251, 207, 232, 0.45);
            color: var(--primary-dark);
            border: 1px solid rgba(251, 207, 232, 0.9);
        }

        .alert-danger {
            background: rgba(254, 205, 211, 0.7);
            color: var(--danger);
            border: 1px solid rgba(251, 207, 232, 0.9);
        }

        .pagination .page-link {
            background: #ffffff !important;
            border-color: rgba(251, 207, 232, 0.9) !important;
            color: var(--text) !important;
            transition: all 0.2s;
        }

        .pagination .page-link:hover {
            background: rgba(251, 207, 232, 0.6) !important;
            border-color: var(--primary) !important;
            color: var(--primary-dark) !important;
        }

        .pagination .active .page-link {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
        }

        .pagination .disabled .page-link {
            background: #ffffff !important;
            border-color: rgba(251, 207, 232, 0.6) !important;
            color: var(--muted) !important;
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid rgba(251, 207, 232, 0.9);
            border-radius: 18px;
            padding: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(236, 72, 153, 0.12);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            background: rgba(236, 72, 153, 0.12);
            color: var(--secondary);
        }

        .main-content {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 1.95rem;
            font-weight: 800;
            color: var(--text);
        }

        .check-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 14px;
            cursor: pointer;
            transition: background 0.15s;
            color: var(--text);
            border: 1px solid rgba(251, 207, 232, 0.8);
            background: rgba(253, 242, 248, 0.85);
        }

        .check-group label:hover {
            background: rgba(251, 207, 232, 0.95);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .detail-label {
            color: var(--muted);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 700;
        }

        .detail-value {
            color: var(--text);
            font-size: 1rem;
        }

        .price-display {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-name {
            color: var(--secondary);
            font-weight: 700;
            transition: color 0.2s;
        }

        .product-name:hover {
            color: var(--primary-dark);
            text-decoration: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('productos.index') }}">
            <i class="bi bi-box-seam-fill me-2"></i>TiendaApp
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}" href="{{ route('productos.index') }}">
                        <i class="bi bi-grid-3x3-gap me-1"></i>Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm ms-2" href="{{ route('productos.create') }}">
                        <i class="bi bi-plus-lg me-1"></i>Nuevo Producto
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="main-content">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</main>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
