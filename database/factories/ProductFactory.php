<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    private static array $products = [
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
        'Controlador Xbox Series X Blanco',
        'Auriculares Sony WH-1000XM5',
        'Disco SSD Samsung 870 EVO 1TB',
        'Memoria RAM Corsair 32GB DDR5',
        'Fuente de poder Corsair 750W 80+Gold',
        'Tarjeta gráfica NVIDIA RTX 4060',
        'Procesador Intel Core i7-13700K',
        'Placa madre ASUS ROG Strix Z790-F',
        'Refrigeración líquida Corsair H100i',
        'Gabinete NZXT H510 Flow',
        'Cargador inalámbrico Belkin 15W',
        'Cable HDMI 2.1 Anker 2m',
        'Hub USB-C Amazon Basics 7 en 1',
        'Webcam Logitech C920 HD Pro',
        'Micrófono Blue Yeti USB',
    ];

    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->randomElement(self::$products),
            'description' => $this->faker->sentence(rand(8, 15)),
            'price'       => $this->faker->randomFloat(2, 199, 24999),
            'category_id' => Category::factory(),
        ];
    }
}
