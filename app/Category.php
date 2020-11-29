<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function amigos()
    {
        return $this->hasMany(Amigo::class);
    }

}
