<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    private static array $tags = [
        'Oferta', 'Nuevo', 'Premium', 'Importado', 'Nacional',
        'Garantía', 'Envío Gratis', 'Eco-amigable', 'Limitado', 'Descuento',
        'Exclusivo', 'Recomendado', 'Agotándose', 'Sin IVA', 'Meses sin intereses',
    ];

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(self::$tags),
        ];
    }
}
