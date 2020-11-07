@extends('plantilla')
@section('seccion')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de producto</div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"></div>
                        {{ session('status') }}
                     @endif
                <div class="row">
                    <div class="col-6">
                    <img src="{{ $producto->imagen }}" alt="">
                        <h4>{{ $producto->nom_pro }}</h4>
                        <p>{{ $producto->descripcion }}</p>
                        <p>{{ $producto->precio }}</p>

                    </div>
                </div>
                </div>
            
            </div>
        </div>
    </div>

</div>


@endsection