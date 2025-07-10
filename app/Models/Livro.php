<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use SoftDeletes;

    protected $table = 'livros';
    protected $fillable = [
        'titulo',
        'autor',
        'ano_de_lancamento',
        'categoria_id',
        'genero_id',
        'status'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    
    public function genero(){
        return $this->belongsTo(Genero::class);
    }

    public function emprestimos(){
        return $this->hasMany(Emprestimo::class);
    }
    public function avaliacoes()
{
    return $this->hasMany(Avaliacao::class);
}

}
