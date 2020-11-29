@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                <form action="/clientes" method="post">
                    @csrf
                       <strong>Identidade</strong>
                       <input type="text" name="identidade" class="form-control">

                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                        
                        @error('name')
                        
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror

                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" >
                        
                        @error('email')
                        
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror

                        <label for="">Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                        </select>
                       <button class="btn btn-success" type="submit">Submit</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection