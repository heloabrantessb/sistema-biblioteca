<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use SoftDeletes;

    protected $table = 'emprestimos';
    protected $fillable = [
        'user_id',
        'livro_id',
        'data_inicio',
        'data_fim_previsao',
        'data_fim_real',
        'status',
    ];

     public function user(){
        return $this->belongsTo(User::class);
    }

    public function livro(){
        return $this->belongsTo(Livro::class);
    }

    public function comprovante(){
        return $this->hasOne(Comprovante::class);
    }
}
