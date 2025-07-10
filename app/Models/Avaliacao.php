<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
     protected $fillable = ['user_id', 'livro_id', 'emprestimo_id', 'nota', 'comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class);
    }
}
