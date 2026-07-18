# TiendaApp — Laravel 12 CRUD

**Sistema de gestión de productos con paleta rosa profesional**

Aplicación web desarrollada en **Laravel 12** para gestionar productos, categorías y etiquetas con un CRUD completo, diseño moderno y una configuración lista para MySQL.

---

## Resumen del proyecto

TiendaApp es una aplicación de ejemplo que permite:

- Crear, listar, ver, editar y eliminar productos.
- Gestionar la relación **Producto → Categoría** (uno a muchos).
- Gestionar la relación **Producto ↔ Etiqueta** (muchos a muchos).
- Navegar productos con paginación optimizada.
- Usar Bootstrap 5 y estilos rosas para un diseño limpio y profesional.
- Cargar datos de muestra mediante seeders y factories.

---

## Arquitectura y flujo

### Estructura principal

| Modelo | Descripción |
|---|---|
| `Product` | Producto con nombre, descripción, precio y categoría.
| `Category` | Categoría que agrupa productos.
| `Tag` | Etiqueta reusable para productos.
| `product_tag` | Tabla pivote para la relación muchos a muchos.

### Relación de datos

- `Product` pertenece a `Category`.
- `Category` tiene muchos `Product`.
- `Product` tiene muchas `Tag`.
- `Tag` pertenece a muchos `Product`.

### Comportamiento implementado

- `ProductController` gestiona el CRUD completo.
- El listado usa `paginate(8)` para mostrar resultados paginados.
- El detalle del producto carga categoría y etiquetas relacionadas.
- El seeder genera 25 productos de prueba con categorías y etiquetas.

---

## Instalación y configuración

### Requisitos

- PHP 8.2 o superior
- Composer
- MySQL 8.0 o superior
- Node.js / npm (opcional para assets)

### Instalación rápida

```bash
# Clonar el repositorio
git clone <url-del-repo>
cd IMVVCact3_t4

# Instalar dependencias de PHP
composer install

# Copiar el entorno
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### Configurar la base de datos

Edita `.env` y define tus credenciales MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peliculas_db
DB_USERNAME=root
DB_PASSWORD=tu_password
```

Crea la base de datos en MySQL:

```bash
mysql -u root -p -e "CREATE DATABASE peliculas_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

### Iniciar el servidor

```bash
php artisan serve
```

Abre la app en:

```bash
http://127.0.0.1:8000
```

---

## Rutas principales

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/` | Listado principal de productos |
| GET | `/productos/create` | Formulario para crear producto |
| POST | `/productos` | Guardar nuevo producto |
| GET | `/productos/{producto}` | Ver detalle de producto |
| GET | `/productos/{producto}/edit` | Editar producto |
| PUT/PATCH | `/productos/{producto}` | Actualizar producto |
| DELETE | `/productos/{producto}` | Eliminar producto |

---

## Estilo y UI

La interfaz usa una paleta de rosas desde un rosa fuerte hasta tonos suaves, con fondo blanco y componentes bien espaciados:

- Colores principales: `#d946ef`, `#c026d3`, `#ec4899`
- Fondo blanco para mejorar contraste y lectura.
- Botones y tarjetas con sombras suaves y bordes redondeados.
- Tipografía `Inter` para modernidad y claridad.

---

## Tecnologías utilizadas

- **Laravel 12**
- **MySQL**
- **Bootstrap 5**
- **Bootstrap Icons**
- **Blade templates**
- **Eloquent ORM**
- **Factories y Seeders**

---

## Notas adicionales

- El proyecto ya incluye 25 productos de prueba.
- La ruta principal (`/`) muestra el listado de productos.
- El diseño fue personalizado para una apariencia rosa profesional y clara.

