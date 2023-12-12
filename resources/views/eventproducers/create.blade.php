@extends('layouts.panel')

@section('content')  
      
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> Nueva Productora</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/productoras')}}" class="btn btn-sm btn-success">
                  <i class="fas fa-chevron-left"></i>
                  Regresar</a>
                </div>
              </div>
            </div>
              <div class="card-body">

                  @if($errors->any())  
                      @foreach($errors->all() as $error)
                      <div class="alert alert-danger" role="alert">
                           <i class="fas fa-exclamation-triangle"></i>
                           <strong>Por favor!</strong> {{ $error}}
                       </div>
                      @endforeach
                  @endif
                
                  <form  action="{{ url('/productoras')}}" method="POST">
                    @csrf
                     <div class="form-group">
                        <label for="name">Nombre de la produccion</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                     </div>
                     <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="text" name="image" class="form-control" value="{{old('image')}}">
                     </div>

                     <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                     </div>
                     <button type="submit" class="btn btn-sm btn-primary">Crear Produccion</button>
                  </form>
              </div>
          </div>
        
@endsection
