@extends('plantilla')
@section('seccion')


<section class="page-section" id="#">
<h1>LISTA DE PRODUCTOS A COMPRAR</h1>

        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert"></div>
                {{ session('status') }}
             @endif
        
        @php
            $valor = 0
           
        @endphp
        @php
            
            $valortotal = 0
        @endphp

    @if (session('cart'))
        <table class="table">
            <thead>
              <tr>
                <th>NOMBRE DEL PRODUCTO</th>
                <th>IMAGEN</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
                <th>ACCIONES</th>

              </tr>
            </thead>
            @foreach ( session('cart') as $id => $details)
                @php
                    $valor += $details['precio'] * $details['cantidad']
                @endphp
            
           
                <tbody>
                  <tr>
                    <td> <strong>{{ $details['nombre'] }}</strong> </td>
                    <td><img src="{{ $details['imagen'] }}" height="50" width="50" alt=""></td>
                    <td> {{ $details['precio'] }} </td>
                    <td>{{ $details['cantidad'] }} </td>
                    <td>{{  $details['precio']  * $details['cantidad'] }}</td>
                    <td>
                        <a href="{{ url('delete-to-cart/'.$id) }}" class="btn btn-danger" role="button" aria-pressed="true">ELIMINAR AL CARRITO</a>
                    </td>

                    
                  </tr>
                </tbody>
                  
            @endforeach
        </table>  
    @endif
        <table align="center">
            <th>
                <p></p>
            <p>Valor  {{ $valor }}</p>
            <p>IVA {{ $valor * 0.12 }}</p>
            <p> Total Q{{  $valortotal = $valor + $valor * 0.12 }}</p>
           
            </th>
        </table>
<br>
<br>
<br>


    <div class="form-group">

        <form  action="{{route('guardar')}}" method="POST">
          @csrf 
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input 
                type="text" 
                class="form-control" 
                id="nombre"
                name="nombre"
                 placeholder="Ingresa tu Nombre"
                 required>

            
            </div>
           
            <div class="form-group">
              <label for="email">Correo electronico</label>
              <input type="email"
               name="correo" 
               class="form-control" 
               id="correo" 
               aria-describedby="emailHelp" 
               placeholder="Ingresa tu Correo"
               required>
              
            </div>
            
            
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input 
                type="text" 
                name="telefono" 
                class="form-control" 
                id="telefono"
                 placeholder="Telefono"
                 required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="direccion">Direccion</label>
                    <input type="text" 
                    name="direccion" 
                    class="form-control" 
                    id="direccion"
                    required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Departamento</label>
                  <select id="inputState" 
                  name="departamento"
                  class="form-control"
                  required>

                    <option selected>Huhuetenango</option>
                    <option>Baja Verapaz</option>
                    <option>Alta Verapaz</option>
                    <option>Guatemala</option>
                    <option>Peten</option>
                    <option>Quiche</option>

                  </select>
                </div>

                

              </div>
            </div>
            
          
                <button type="submit" class="btn btn-secondary btn-lg text-white-50 ">ACEPTAR</button>


            <a href="{{ url('pagar/'.$valortotal) }}"  class="btn btn-secondary btn-lg text-white-50 " role="button" aria-pressed="true">CONFIRMAR COMPRAR</a>

          </form>




        
        
        
        

    </div>
        </div>
    
       
</section>




@endsection