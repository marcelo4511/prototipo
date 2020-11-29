@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('/config/categorias/create') }}" class="btn btn-info">Cadastrar</a>
<h5 class="mt-100"> Lista de Amigos</h5> 
            <table class="table table-bordered table-hover" id="tabelaprodutos" >
              <thead>
                <tr> 
                
                 <th>Nome</th>
                 <th>Ações</th>
                 </tr>
              </thead>
              <tbody>
                
                @foreach($relacionamentos as $c)
                  <tr> 
                    <td>{{$c->user->name}}</td> 
                    <td>
                    <div class="row">
                    @if(Auth::user())
                    <form method="post" action="{{ route('relacionamento.store') }}">
                    @csrf
                    <input type="hidden" name="conexao_id" id="conexao_id" value="{{$c->id}}">
                    <button href="{{ route('relacionamento.store') }}" class="btn btn-success mr-1">Conectar</button>
                    </form>
                      @endif
                      <button href="{{ route('categorias.destroy', $c->id) }}" class="btn btn-primary mr-1">Editar</button>

                      </form>
                    </td>
                  </tr>
                  
                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>
        </div>


  
  </div> 

@endsection