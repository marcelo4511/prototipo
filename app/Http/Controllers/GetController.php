<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    public function getCategorias()
    {
        return Category::with('produtos')->get();
        
    }
}
