<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i < 3; $i++){
            Venda::create([
                'numero_da_venda' => $faker->numberBetween(0,5),
                'produto_id' => $faker->numberBetween(27,36),
                'cliente_id' => $faker->numberBetween(11,15)
            ]);
        }



    }
}
