<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genero::create(['nome' => 'Romance']);
        Genero::create(['nome' => 'Fantasia']);
        Genero::create(['nome' => 'Poesia']);
        Genero::create(['nome' => 'Distopia']);
        Genero::create(['nome' => 'Utopia']);
        Genero::create(['nome' => 'Terror']);
        Genero::create(['nome' => 'Suspense']);
        Genero::create(['nome' => 'Saude Mental']);
        Genero::create(['nome' => 'Ciências Humanas']);
    }
}
