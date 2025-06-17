<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprovante extends Model
{
    use SoftDeletes;

    protected $table = 'comprovantes';
    protected $fillable = [
        'emprestimo_id',
        'arquivo_ur',
    ];

    public function emprestimo(){
        return $this->belongsTo(Emprestimo::class);
    }
}
