@extends('layouts.app')

@section('content')
<div class="container">
  <form method="get" action="/amigos/search">
  {{csrf_field()}}
    <div class="form-row">
      <div class="form-group">
        <label for="">Nome do amigo</label>
        <input type="text" name="name" class="form-control">

        @error('name')
        <div class="invalid-feedback">
        {{message}}
        </div>
        @enderror
      </div>

        <div class="form-group">
        <label for="">Categoria do amigo</label>
          <select name="category_id" id="category_id" class="form-control mr-5">
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>

    <div class="form-group">
      <button class="btn btn-success" type="submit">FIltrar</button>
    </div>
  </div>    
  </form>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Amigos registrados  <a href="{{ url('amigos/create') }}" class="btn btn-info">Cadastrar outro amigo!!</a> </div>

                <div class="card-body">
                  <table class="table">
                    <th>Name</th>
                    <th>Size</th>
                      @foreach($files as $file)
                        <div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
                            <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $file->image }}">
                          <div class="card-body">
                            <h2>{{$file->name}}</h2>
                            Categoria: <h2>{{$file->categoria->name ?? null}}</h2>
                          <div class="d-flex justify-content-between align-items-center">
                           
                            <form action="/amigos/{{$file->id}}"method="post"id="btn">
                            @csrf
                            @method('delete')
                            <button type="submit"id="btn" class="btn btn-sm btn-danger">Apagar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

                
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection