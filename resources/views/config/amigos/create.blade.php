@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add files</div>

                <div class="card-body">
                <form  action="/amigos" method="post" enctype="multipart/form-data">
                      @csrf 
                       <strong>Imagem</strong>
                       <input type="file" name="image" class="form-control">

                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control">

                        <label for="">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                       <button class="btn btn-success">Submit</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection