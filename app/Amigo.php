<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    protected $fillable = ['image','name','category_id'];

    public function categoria() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
