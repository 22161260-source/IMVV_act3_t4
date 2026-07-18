<div align="center">

# 🌸 TiendaApp
### Sistema de Gestión de Productos

<img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
<img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white">
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white">
<img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white">

Aplicación web desarrollada con **Laravel 12** para administrar productos mediante un CRUD completo, con una interfaz moderna y elegante en tonos rosa.

</div>

---

# 🌷 Vista previa

<p align="center">
<img src="captura.png" width="900">
</p>

> Guarda tu imagen con el nombre **captura.png** dentro del repositorio para que aparezca automáticamente.

---

# ✨ Características

💖 CRUD completo de productos

📂 Gestión de categorías

🏷️ Gestión de etiquetas

📄 Paginación automática

🎨 Diseño moderno con Bootstrap 5

⚡ Eloquent ORM

🗄️ Base de datos MySQL

---

# 🏗️ Arquitectura

## Modelos

| Modelo | Descripción |
|---------|-------------|
| 📦 Product | Información del producto |
| 📂 Category | Categorías disponibles |
| 🏷️ Tag | Etiquetas reutilizables |
| 🔗 product_tag | Relación muchos a muchos |

---

## Relaciones

```
Categoría
    │
    │ 1
    │
    ▼
 Producto
    ▲
    │
    │ N
    │
 Etiquetas
```

- Un producto pertenece a una categoría.
- Una categoría tiene muchos productos.
- Un producto puede tener muchas etiquetas.
- Una etiqueta puede pertenecer a muchos productos.

---

# 🚀 Instalación

## 1️⃣ Clonar repositorio

```bash
git clone <url-del-repo>
cd IMVVCact3_t4
```

## 2️⃣ Instalar dependencias

```bash
composer install
```

## 3️⃣ Configurar entorno

```bash
copy .env.example .env
```

Generar la clave:

```bash
php artisan key:generate
```

---

# 🗄️ Configuración de MySQL

Editar el archivo `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peliculas_db
DB_USERNAME=root
DB_PASSWORD=
```

Crear la base de datos:

```sql
CREATE DATABASE peliculas_db;
```

---

# ⚙️ Migraciones

```bash
php artisan migrate --seed
```

---

# ▶️ Ejecutar

```bash
php artisan serve
```

Abrir en el navegador:

```
http://127.0.0.1:8000
```

---

# 📌 Rutas

| Método | Ruta | Acción |
|---------|------|---------|
| GET | / | Listar productos |
| GET | /productos/create | Crear producto |
| POST | /productos | Guardar producto |
| GET | /productos/{id} | Mostrar producto |
| GET | /productos/{id}/edit | Editar producto |
| PUT | /productos/{id} | Actualizar producto |
| DELETE | /productos/{id} | Eliminar producto |

---

# 🎨 Diseño

La aplicación utiliza una interfaz moderna basada en una paleta de colores rosa.

🌸 Rosa principal

💜 Morado

🤍 Blanco

Los componentes incluyen:

- Tarjetas con sombras suaves
- Botones redondeados
- Tabla responsiva
- Tipografía moderna
- Iconos Bootstrap Icons

---

# 🛠️ Tecnologías

- 🌸 Laravel 12
- 🐘 PHP 8.2
- 🗄️ MySQL
- 🎨 Bootstrap 5
- 📦 Eloquent ORM
- 🧩 Blade
- 🏷️ Bootstrap Icons
- 🌱 Seeders y Factories

---

<div align="center">

## 💕 Desarrollado por

### **VARGAS VICENTE IVONEE MONTSERRAT**

Proyecto académico desarrollado con Laravel 12.

⭐ Si te gusta este proyecto, ¡no olvides darle una estrella!

</div>
