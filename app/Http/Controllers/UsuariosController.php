<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('config.users.index',compact('users'));
    }
}
