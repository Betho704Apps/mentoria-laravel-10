<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeedeer extends Seeder
{

    public function run(): void
    {
        User::create([
                'name' => 'Betho Costa',
                'email' => 'hgc.estudo@gmail.com',
                'password' => encrypt('senha123')
        ]);
    }
}
