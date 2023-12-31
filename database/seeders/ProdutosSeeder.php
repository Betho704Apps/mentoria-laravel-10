<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Faker\Factory as Faker;

class ProdutosSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 

            Produto::create([
                'nome' => $faker->name,
                'valor' => $faker->randomNumber(2)

            ]);
        }
            

    }
}
