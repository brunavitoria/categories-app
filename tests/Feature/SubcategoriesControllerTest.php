<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SubcategoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->category = Category::factory()->create();
    }

    #[Test]
    public function it_can_list_subcategories()
    {
        Subcategory::factory(5)->create([
            'category_id' => $this->category->id
        ]);

        $response = $this->actingAs($this->user, 'sanctum')
            ->getJson('/api/categories/' . $this->category->id . '/subcategories');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    #[Test]
    public function it_can_create_a_subcategory()
    {
        $data = [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'category_id' => $this->category->id
        ];

        $response = $this->actingAs($this->user, 'sanctum')
            ->postJson('/api/categories/' . $this->category->id . '/subcategories', $data);      
            
        $response->assertStatus(201)
            ->assertJsonFragment([
                'message' => 'Subcategory created successfully'
            ]);
    }

    #[Test]
    public function it_can_update_a_subcategory()
    {
        $subcategory = Subcategory::factory()->create([
            'category_id' => $this->category->id
        ]);

        $data = [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'category_id' => $this->category->id
        ];

        $response = $this->actingAs($this->user, 'sanctum')
            ->putJson('/api/categories/' . $this->category->id . '/subcategories/' . $subcategory->id, $data);      
            
        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => 'Subcategory updated successfully'
            ]);
    }

    #[Test]
    public function it_can_delete_a_subcategory()
    {
        $subcategory = Subcategory::factory()->create([
            'category_id' => $this->category->id
        ]);

        $response = $this->actingAs($this->user, 'sanctum')
            ->deleteJson('/api/categories/' . $this->category->id . '/subcategories/' . $subcategory->id);   
            
            
        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => 'Subcategory deleted successfully'
            ]);
    }

}
