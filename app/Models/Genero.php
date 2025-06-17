<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;

    protected $table = 'generos';
    protected $fillable = ['nome'];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}
