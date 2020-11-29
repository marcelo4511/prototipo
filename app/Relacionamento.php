<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    protected $fillable = [
        'user_id',
        'conexao_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'conexao_id');
    }
}
