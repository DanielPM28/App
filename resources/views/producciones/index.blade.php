@extends('layouts.panel')

@section('content')  
      
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Producciones</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/producciones/create')}}" class="btn btn-sm btn-primary">Nueva produccion</a>
                </div>
              </div>
            </div>
            <div class="card-body">
               @if(session('notification'))
               <div class="alert alert-success" role="alert">
                     {{session('notification')}}
               </div>
               @endif
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Opciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($productions as $produccion)
                  <tr>
                    <th scope="row">
                      {{$produccion->name}}
                    </th>
                    <td>
                      {{$produccion->email}}
                    </td>
                    <td>
                      {{$produccion->cedula}}
                    </td>
                    <td>
                        
                        <form action="{{url('/producciones/'.$produccion->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/producciones/'.$produccion->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                          <button  type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        
                    </td>
                   
                    
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
               
            <div class="card-body">
               {{$productions->links()}}
            </div>

          </div>
        
@endsection