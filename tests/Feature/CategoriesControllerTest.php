<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    #[Test]
    public function it_can_get_all_categories()
    {
        Category::factory(5)->create();

        $response = $this->actingAs($this->user, 'sanctum')
            ->getJson('/api/categories');

        $response->assertStatus(200)
            ->assertJsonCount(5);      
    }

    #[Test]
    public function it_can_create_a_category()
    {
        $response = $this->actingAs($this->user, 'sanctum')
            ->postJson('/api/categories', [
                'name' => fake()->name(),
                'description' => fake()->text(),
            ]);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'message' => 'Category created successfully'
            ]);
    }

    #[Test]
    public function it_can_show_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->user, 'sanctum')
            ->getJson('/api/categories/' . $category->i);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'created_at' => $category->created_at,
                'updated_at' => $category->updated_at,
            ]);
    }

    #[Test]
    public function it_can_update_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->user, 'sanctum')
            ->putJson('/api/categories/' . $category->id, [
                'name' => fake()->name(),
                'description' => fake()->text(),
            ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => 'Category updated successfully'
            ]);
    }

    #[Test]
    public function it_can_delete_a_category()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $category = Category::factory()->create();

        $response = $this->actingAs($this->user, 'sanctum')
            ->deleteJson('/api/categories/' . $category->id);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => 'Category deleted successfully'
            ]);
    }
}
