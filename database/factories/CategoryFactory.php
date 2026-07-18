<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    private static array $categories = [
        'Electrónica', 'Ropa y Moda', 'Hogar y Jardín', 'Deportes',
        'Juguetes', 'Libros', 'Herramientas', 'Alimentos',
        'Belleza', 'Automotriz',
    ];

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(self::$categories),
        ];
    }
}
