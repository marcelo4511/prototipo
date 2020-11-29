<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClienteEmail;
use App\Http\Requests\ClienteRequest;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('config.clientes.index',compact('clientes'));
    }
    public function store(ClienteRequest $request)
    {
        $data = $request->all();
       
            Cliente::create($data);
        
            $this->enviarEmail();
            return redirect()->route('clientes.index');  
    }

    public function create() {
    
        return view('config.clientes.create');
    }

    private function enviarEmail(Request $request){
        Mail::to('marcelobs96@bol.com.br')->send(new ClienteEmail($request));
    }
}
