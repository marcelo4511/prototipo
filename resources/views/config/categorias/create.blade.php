@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/categorias" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome da categoria</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-info">Salvar</button>
        <button type="cancel" class="btn btn-danger">Cancelar</button>
    </form>
</div>

@endsection