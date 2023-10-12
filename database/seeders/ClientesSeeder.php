<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 

            Cliente::create([
                'nome' => $faker->name,
                'email' => $faker->email(),
                'endereco' => $faker->address(),
                'logradouro'=> $faker->city(),
                'cep' => $faker->postcode(),
                'bairro' => $faker->city()

            ]);
        }
    }
}
