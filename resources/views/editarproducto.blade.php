@extends('plantilla')
@section('seccion')
<h1>EDIT PRO</h1>


<form action="" class="form-inline">
    <input type="text" 
    name="buscarpor"
    value=""
    class="form-control" 
    placeholder="Busca tu producto" aria-label="Recipient's username" aria-describedby="basic-addon2">


    
    <div class="form-group text-center">
        <button class="btn btn-primary btn" 
        
        id="sendMessageButton" type="submit">Buscar</button>
    
    </div>
</form>



@endsection