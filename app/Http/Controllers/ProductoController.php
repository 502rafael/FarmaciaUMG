<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adfarmacia(){
        $producto = App\Producto::all();
        
        
            return view('administrarfarmacia',compact('producto'));
        
        }

        public function detalle(){
            $detalle = App\DetalleVenta::all();
            
            
                return view('ventas',compact('detalle'));
            
            }
            public function usuarios(){
                $detalle = App\User::all();
                
                
                    return view('usuarios',compact('detalle'));
                
                }
}
