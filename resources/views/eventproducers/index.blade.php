@extends('layouts.panel')

@section('content')  
      
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Productoras</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/productoras/create')}}" class="btn btn-sm btn-primary">Nueva Productora</a>
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
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                    <th scope="col">Imagen</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($eveproducers as $productora)
                  <tr>
                    <th scope="row">
                      {{$productora->name}}
                    </th>
                    <td>
                      {{$productora->description}}
                    </td>
                    <td>
                        
                        <form action="{{url('/productoras/'.$productora->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/productoras/'.$productora->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                          <button  type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        
                    </td>
                    <td>
                      {{$productora->image}}
                    </td>
                    
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        
@endsection
