<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nome' => 'Infantil']);
        Categoria::create(['nome' => 'Ficção']);
        Categoria::create(['nome' => 'Não Ficção']);
        Categoria::create(['nome' => 'Biografia']);
        Categoria::create(['nome' => 'Autobiografia']);

    }
}
    