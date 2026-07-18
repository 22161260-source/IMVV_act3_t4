<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Crear categorías con nombres fijos (relación uno a muchos)
        $categoryNames = ['Electrónica', 'Ropa y Moda', 'Hogar y Jardín', 'Deportes', 'Herramientas'];
        $categories = collect($categoryNames)->map(fn($name) => Category::create(['name' => $name]));

        // Crear etiquetas con nombres fijos (relación muchos a muchos)
        $tagNames = ['Oferta', 'Nuevo', 'Premium', 'Importado', 'Nacional', 'Garantía', 'Envío Gratis', 'Eco-amigable', 'Limitado', 'Descuento'];
        $tags = collect($tagNames)->map(fn($name) => Tag::create(['name' => $name]));

        // 25 productos distribuidos entre las categorías (sin unique para evitar overflow)
        $productNames = [
            'Audífonos Bluetooth JBL Tune 520BT',
            'Smartwatch Samsung Galaxy Watch 6',
            'Teclado mecánico Logitech G Pro',
            'Monitor LG 27" UltraWide 4K',
            'Silla gamer DXRacer Formula',
            'Laptop ASUS ROG Zephyrus 14"',
            'Cámara Sony ZV-E10 Mirrorless',
            'Mouse inalámbrico Logitech MX Master 3',
            'Bocina portátil JBL Charge 5',
            'Tablet Samsung Galaxy Tab S9',
            'Controlador Xbox Series X',
            'Auriculares Sony WH-1000XM5',
            'Disco SSD Samsung 870 EVO 1TB',
            'Memoria RAM Corsair 32GB DDR5',
            'Fuente de poder Corsair 750W',
            'Tarjeta gráfica NVIDIA RTX 4060',
            'Procesador Intel Core i7-13700K',
            'Placa madre ASUS ROG Strix Z790',
            'Refrigeración líquida Corsair H100i',
            'Gabinete NZXT H510 Flow',
            'Cargador inalámbrico Belkin 15W',
            'Cable HDMI 2.1 Anker 2m',
            'Hub USB-C 7 en 1',
            'Webcam Logitech C920 HD Pro',
            'Micrófono Blue Yeti USB',
        ];

        $descriptions = [
            'Excelente calidad de sonido con cancelación de ruido activa.',
            'Diseño elegante con pantalla AMOLED y batería de larga duración.',
            'Switches mecánicos táctiles ideales para gaming y trabajo.',
            'Colores vibrantes y tasa de refresco de 144Hz para gamers.',
            'Ergonomía premium con soporte lumbar ajustable.',
            'Potencia y portabilidad en un solo equipo ultradelgado.',
            'Captura video 4K y fotos profesionales en formato compacto.',
            'Sensor de alta precisión y conectividad multidispositivo.',
            'Resistente al agua IP67 con 20 horas de batería.',
            'Pantalla AMOLED 11" con soporte S Pen incluido.',
            'Diseño ergonómico y retroiluminación RGB personalizable.',
            'La mejor cancelación de ruido del mercado en 2024.',
            'Lectura y escritura ultrarrápida para edición y gaming.',
            'Velocidades DDR5 para un rendimiento sin igual.',
            'Certificación 80 Plus Gold con cables modulares.',
            'Ray Tracing y DLSS 3 para experiencias visuales increíbles.',
            'Rendimiento top tier para productividad y gaming.',
            'Compatible con DDR5 y PCIe 5.0 para futuras actualizaciones.',
            'Sistema de enfermería líquida silencioso y eficiente.',
            'Flujo de aire optimizado con panel frontal de malla.',
            'Carga hasta 3 dispositivos simultáneamente.',
            'Soporte 4K@120Hz para la mejor experiencia audiovisual.',
            'Compatibilidad universal con múltiples dispositivos.',
            'Video Full HD con autoenfoque facial inteligente.',
            'Calidad de estudio con patrón polar cardioid.',
        ];

        foreach ($productNames as $index => $name) {
            $product = Product::create([
                'name'        => $name,
                'description' => $descriptions[$index],
                'price'       => round(rand(19900, 2499900) / 100, 2),
                'category_id' => $categories->random()->id,
            ]);

            // Asignar entre 1 y 4 etiquetas aleatorias (muchos a muchos)
            $product->tags()->sync($tags->random(rand(1, 4))->pluck('id')->all());
        }
    }
}
