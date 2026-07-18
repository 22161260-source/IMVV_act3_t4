<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_crud_and_relationships_work(): void
    {
        $category = Category::create(['name' => 'Tecnología']);
        $tag1 = Tag::create(['name' => 'Nuevo']);
        $tag2 = Tag::create(['name' => 'Oferta']);

        $response = $this->post('/productos', [
            'name' => 'Laptop Pro',
            'description' => 'Una laptop potente.',
            'price' => '1299.99',
            'category_id' => $category->id,
            'tags' => [$tag1->id, $tag2->id],
        ]);

        $response->assertRedirect('/productos');
        $this->assertDatabaseHas('products', ['name' => 'Laptop Pro', 'price' => 1299.99]);

        $product = Product::where('name', 'Laptop Pro')->firstOrFail();
        $this->assertTrue($product->category->is($category));
        $this->assertCount(2, $product->tags);

        $this->get('/productos')->assertOk()->assertSee('Laptop Pro')->assertSee('Tecnología');
        $this->get('/productos/' . $product->id)->assertOk()->assertSee('Laptop Pro')->assertSee('Nuevo')->assertSee('Oferta');

        $updateResponse = $this->put('/productos/' . $product->id, [
            'name' => 'Laptop Pro 2026',
            'description' => 'Actualizada.',
            'price' => '1499.99',
            'category_id' => $category->id,
            'tags' => [$tag2->id],
        ]);

        $updateResponse->assertRedirect('/productos/' . $product->id);
        $this->assertDatabaseHas('products', ['name' => 'Laptop Pro 2026', 'price' => 1499.99]);

        $this->delete('/productos/' . $product->id)->assertRedirect('/productos');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
