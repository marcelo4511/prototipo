@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ url('/config/categorias/create') }}" class="btn btn-info">Cadastrar</a>
<h5 class="mt-100"> Lista de categorias</h5> 
            <table class="table table-bordered table-hover" id="tabelaprodutos" >
              <thead>
                <tr> 
                
                 <th>Nome</th>
                 <th>Ações</th>
                 </tr>
              </thead>
              <tbody>
                
                @foreach($categorias as $c)
                  <tr> 
                    <td>{{$c->name}}</td> 
                    <td>
                    <div class="row">
                      <button href="{{ route('categorias.destroy', $c->id) }}" class="btn btn-primary mr-1">Editar</button>

                      
                      <form method="post" action="{{ route('categorias.destroy', $c->id) }}" >
                      @csrf
                      @method('delete')
                      <input type="hidden" name="id" value="{{$c->id}}">
                      
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo-{{$c->id}}" type="button">Apagar</button>
                    </div>
                      <div class="modal fade" id="modalExemplo-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header mx-auto">
                                                <p class="h5 text-center">Confirmar a exclusão da categoria?</p>
                                            </div>
                            <div class="modal-footer">
                              <div class="mx-auto">
                                <button class="btn btn-primary">sim</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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