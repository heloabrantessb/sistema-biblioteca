<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';
    protected $fillable = [
        'funcao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
