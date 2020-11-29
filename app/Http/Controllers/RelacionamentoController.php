<?php

namespace App\Http\Controllers;
use App\Relacionamento;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RelacionamentoController extends Controller
{

    public function index()
    {
        $relacionamentos = Relacionamento::select('id','user_id','conexao_id')->get();
       
        return view('config.relacionamentos.index',compact('relacionamentos'));
    }
    public function store(Request $request)
    {
        try{

            $user = Auth::user();
            
            $data = $request->all();
            $validate = Validator::make($request->all(), [
                'conexao_id' => 'required|unique:relacionamentos',
                'user_id' => 'required|unique:relacionamentos',
            ]);
    
            $data['user_id'] = $user->id;
            $data['conexao_id'] = $request->conexao_id;
            
            dd($data);
            if ($validate->fails()) {
                return response()->json(['errors' => $validate->errors()]);
            } 

            if(count($data['user_id'] && $data['conexao_id']) == 1){
                Relacionamento::create($data);
                return redirect()->route('users.index');
            }
            

        }catch(Exception $e){
            return response()->json(['error' => $e]);
        }
    }
}
