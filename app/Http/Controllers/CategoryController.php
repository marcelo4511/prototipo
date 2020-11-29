<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::with('amigos')->get();
        return view('config.categorias.index',compact('categorias'));
    }



    public function create()
    {
        return view('config.categorias.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        } else {
            Category::create($data);
            return redirect()->route('categorias.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Category::all();
        $edit = Category::find($id);
        return redirect()->route('categorias.edit',compact('categorias','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Category::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}