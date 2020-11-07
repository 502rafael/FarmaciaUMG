@extends('plantilla')
@section('seccion')
    
{{-- 
<form action="" class="form-inline">
    <input type="text" 
    name="buscarpor"
    value="{{  $buscarpor }}"
    class="form-control" 
    placeholder="Busca tu producto" aria-label="Recipient's username" aria-describedby="basic-addon2">


    
    <div class="form-group text-center">
        <button class="btn btn-primary btn" 
        
        id="sendMessageButton" type="submit">Buscar</button>
    
    </div>
</form> --}}

    <h1>LISTA DE PRODUCTOS</h1>
    
    {{-- <h4>hhh {{ $buscarpor}}</h4> --}}


    @if (session('add'))
    <div class="alert alert-success">
        {{ session('add') }}
    </div>
        
    @endif


@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif

<div class="row">



@foreach ($productos as $producto)
    <div class="col-3">
        <div class="card">
            <img src="{{ $producto->imagen }}" alt="" class="card-img-top">
            
            <div class="card-body">
                <h5 class="card-title text-black-50"> {{ $producto->nom_pro}} </h5>
                <h5 class="card-title text-black-50">
                   Q. {{ $producto->precio_pro}}
                    
                </h5>
               
                {{-- <p class="card-text text-black-50"> {{ $producto->stock}}</p> --}}

          <a href="{{ url('add-to-cart/'.$producto->cod_pro) }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">AGREGAR AL CARRITO</a>
                

            {{-- <a href="{{ url('product-detali/'.$producto->cod_pro) }}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">DETALLE CARRITO</a> --}}
            
        </div>
        </div>
    </div>

@endforeach

</div>

@endsection