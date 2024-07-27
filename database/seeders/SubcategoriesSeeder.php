<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->toArray();
        
        Subcategory::insert([
            [
                'name' => 'Seguro de Vida Individual',
                'description' => 'Protege financeiramente os beneficiários em caso de falecimento do segurado, cobrindo despesas e garantindo o sustento da família.',
                'category_id' => $categories[0]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro de Vida Coletivo',
                'description' => ' Geralmente oferecido por empregadores, proporciona cobertura de vida para funcionários com custo reduzido.',
                'category_id' => $categories[0]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro de Vida Temporário',
                'description' => 'Seguro de vida com prazo determinado, ideal para proteger o segurado durante períodos específicos, como o pagamento de uma hipoteca.',
                'category_id' => $categories[0]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plano de Saúde Individual',
                'description' => 'Cobertura médica que inclui consultas, exames, e internações, garantindo assistência médica ao segurado.',
                'category_id' => $categories[1]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plano de Saúde Familiar',
                'description' => 'Similar ao plano individual, mas estende a cobertura para todos os membros da família.',
                'category_id' => $categories[1]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro Saúde',
                'description' => 'Oferece cobertura adicional para despesas médicas que podem não ser cobertas por planos de saúde tradicionais.',
                'category_id' => $categories[1]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plano Odontológico Individual',
                'description' => 'Cobre tratamentos dentários como consultas, limpezas, e procedimentos de rotina.',
                'category_id' => $categories[2]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plano Odontológico Familiar',
                'description' => 'Extensão do plano odontológico individual para todos os membros da família, cobrindo uma ampla gama de tratamentos dentários.',
                'category_id' => $categories[2]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro de Acidentes Pessoais Individual',
                'description' => 'Proporciona indenização em caso de morte ou invalidez por acidente, cobrindo também despesas médicas emergenciais.',
                'category_id' => $categories[3]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro de Acidentes Pessoais em Grupo',
                'description' => 'Similar ao individual, mas oferecido para grupos, como empregados de uma empresa, com cobertura para acidentes.',
                'category_id' => $categories[3]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro Viagem Nacional',
                'description' => 'Cobre emergências médicas, cancelamento de viagem, e perda de bagagem em viagens dentro do país.',
                'category_id' => $categories[4]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seguro Viagem InternacionalSeguro Viagem Internacional',
                'description' => 'Similar ao nacional, mas com cobertura estendida para viagens ao exterior, incluindo assistência médica e repatriação.',
                'category_id' => $categories[4]['id'],
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
