<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Administrador',
            'sobrenome' => 'Administrador',
            'cpf' => '00000000000',
            'email' => 'admin@email.com',
            'role_id' => 1,
            'password' => 'admin123'
        ]);

        User::create([
            'name' => 'José Carlos',
            'sobrenome' => 'da Silva',
            'cpf' => '02325685974',
            'email' => 'jose@email.com',
            'role_id' => 4,
            'password' => 'jose123'
        ]);

        User::create([
            'name' => 'Felipe',
            'sobrenome' => 'Silva',
            'cpf' => '12589677463',
            'email' => 'felipe@email.com',
            'role_id' => 2,
            'password' => 'felipe123'
        ]);

        User::create([
            'name' => 'Rafael',
            'sobrenome' => 'Santos',
            'cpf' => '85423685444',
            'email' => 'rafael@email.com',
            'role_id' => 3,
            'password' => 'rafael123'
        ]);
    }
}
