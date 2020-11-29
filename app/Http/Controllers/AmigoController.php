<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amigo;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;
use \Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClienteEmail;

class AmigoController extends Controller

{
    public function index(){
        $files = Amigo::all();
        $categories = Category::all();

        return view('config.amigos.index', compact('files','categories'));
    }

    public function filter(Request $request){
        
        $categories = Category::all();

        $search = $request->all();

        $files = Amigo::select('id', 'name', 'image','category_id')
            ->when(request('name'), function ($query) use ($search) {
                $query->whereName($search['name']);
            })->when(request('categoria'), function ($query) use ($search) {
                $query->whereCategoria($search['categoria']);
            })->get();

        return view('config.amigos.index',compact('files','search','categories'));
     
     }

    public function create() {
        $categories = Category::all();
        return view('config.amigos.create',compact('categories'));
    }
    
    public function uploadFile(Request $request) {

        $validate = Validator::make($request->all(),[
            'image' => "image|mimes:png,jpg|max:2048|required",
            'name' => 'required',
            'category_id' => 'required',
        ]);

        
        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()]);
            $error = 'Na Linha ' . $e->getLine() . ' possui o erro ' . $e->getMessage();
            Log::error($error);
            return redirect()->back()->with('errorMessage', $error);
        } else {
            $a = new Amigo();
            $a->name = $request->input('name');
            $a->category_id = $request->input('category_id');
            $a->image = $request->file('image')->store('images','public');
            $a->save();

            $this->enviarEmail();

            $teste->users()->sync($a['users']);
            return redirect()->route('amigos');
        }
    }

    public function destroy($id)
    {
        $amigo = Amigo::find($id);
        
        $amigo->delete();
        return redirect()->route('amigos');
    }

}
