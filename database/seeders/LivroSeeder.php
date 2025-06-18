<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livro::create([
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'ano_de_lancamento' => 1949,
            'categoria_id' => 2,
            'genero_id' => 4,
            'status' => 'disponivel'
        ]);

        Livro::create([
            'titulo' => 'O Hobbit',
            'autor' => 'J.R.R. Tolkien',
            'ano_de_lancamento' => 1937,
            'categoria_id' => 2,
            'genero_id' => 2,
            'status' => 'disponivel'
        ]);

        Livro::create([
            'titulo' => 'O Demônio do Meio Dia: Uma Anatomia da Depressão',
            'autor' => 'Andrew Solomon',
            'ano_de_lancamento' => 2001,
            'categoria_id' => 3,
            'genero_id' => 8,
            'status' => 'disponivel'
        ]);

        Livro::create([
            'titulo' => 'O Assassino do Zodiaco',
            'autor' => 'Sam Wilson',
            'ano_de_lancamento' => 2017,
            'categoria_id' => 2,
            'genero_id' => 7,
            'status' => 'disponivel'
        ]);
    }
}
