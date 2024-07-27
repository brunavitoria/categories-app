<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Vida',
                'description' => 'Seguros relacionados à vida das pessoas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Saúde',
                'description' => 'Seguros relacionados ao saúde',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Odontológico',
                'description' => 'Seguros relacionados a odontologia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Acidentes Pessoais',
                'description' => 'Seguros relacionados aos acidentes pessoais',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Viagem',
                'description' => 'Seguros relacionados à viagem',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
