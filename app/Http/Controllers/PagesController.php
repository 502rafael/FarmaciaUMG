<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Producto;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function detalle($id){
        $producto = Producto::findOrFail($id);
        return view('productodetalle', compact('producto'));


    }

public function eliminar($id)
{
    $eliminarpro = Producto::findOrFail($id);
    $eliminarpro->delete();

    return back()->with('productoGuardado', 'Producto Eliminado');


}

public function adfarmacia(){
$producto = Producto::all();


    return view('administrarfarmacia',compact('producto'));

}



    public function save(Request $request)
    {
        // $request->validate([
        //     'nombre_pro' => 'required',
        //     'cod_cate' => 'required',
        //     'cod_prov' => 'required',
        //     'precio_pro' => 'required'
        //  ]);
        // return $request->all();
        // $userdata = request()->except('_token');
        // Producto::insert($userdata);
        // return back()->with('productoGuardado', 'Producto Guardado');

        $producto = new Producto;
        // $producto->cod_pro = $request->cod_pro;
        $producto->nom_pro = $request->nom_pro;
        $producto->imagen = $request->imagen;
        $producto->descripcion = $request->descripcion;
        $producto->precio_pro = $request->precio_pro;
        $producto->stock = $request->stock;
        $producto->cod_cate = $request->cod_cate;
        $producto->cod_prov = $request->cod_prov;

        $producto->save();
    
    return back()->with('productoGuardado', 'Producto Guardado');
    
    }


    public function guardar(Request $request)
    {
        // $request->validate([
        //     'nombre_pro' => 'required',
        //     'cod_cate' => 'required',
        //     'cod_prov' => 'required',
        //     'precio_pro' => 'required'
        //  ]);
        // return $request->all();
        // $userdata = request()->except('_token');
        // Producto::insert($userdata);
        // return back()->with('productoGuardado', 'Producto Guardado');

        $producto = new Cliente();
        // $producto->cod_pro = $request->cod_pro;
        $producto->nombre = $request->nombre;
        $producto->correo = $request->correo;
        $producto->telefono = $request->telefono;
        $producto->direccion = $request->direccion;
        $producto->departamento = $request->departamento;

        $producto->save();
    
    return back()->with('clineteGuardado', 'Producto Guardado');
    
    }











    public function buscarproductos(Request $request){
        if ($request) {
        $buscarpor = trim($request->get('buscarpor'));

        $product = Producto::where('nom_pro','LIKE' . $buscarpor . '%')
        ->orderBy('cod_pro', 'asc')
        ->get();


        return view('editarproducto',compact('buscarpor'));

        }
        
    }





    

    public function productos(){
        $productos = Producto::all();
        
        return view('productos',compact('productos'));
    }
    

    public function detail($id){
        $producto = Producto::find($id);
        
        return view('detail')->with('producto', $producto);
    }

    public function pagar($total){
        return view('pagar',compact('total'));
    }



    public function cart(){
        
        
        return view('cart');
    }



    public function addToCart($id){
        $product = Producto::find($id);
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'codigo' => $product->cod_pro,
                    'nombre' => $product->nom_pro,
                    'cantidad' => 1,
                    'precio' => $product->precio_pro,
                    'imagen' => $product->imagen,
                    'descripcion' => $product->descripcion 
                ] 
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('add','Producto Agregado a la Carretilla');
        }

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
            session()->put('cart',$cart);
            return redirect()->back()->with('add','Producto Agregado a la Carretilla');

        }




        $cart[$id] = [
                'codigo' => $product->cod_pro,
                'nombre' => $product->nom_pro,
                'cantidad' => 1,
                'precio' => $product->precio_pro,
                'imagen' => $product->imagen,
                'descricion' => $product->descripcion 
            
        ];
        
        session()->put('cart',$cart);
            return redirect()->back()->with('add','Producto Agregado a la Carretilla');
    }

// -------
    public function eliminardelCarrito($id){
        $cart = session()->get('cart');
        $product = Producto::find($id);

        if (!$cart) {
           
            session()->forget('cart',$cart);
            return redirect()->back()->with('successeli','Prosucto Elimindao');
        }

        
        if (isset($cart[$id])) {
            $cart[$id]['cantidad']--;
            session()->forget('cart',$cart);
            return redirect()->back()->with('successeli','Prosucto Eliminado');

        }
        
    
    session()->forget('cart',$cart);
        return redirect()->back()->with('successeli','Prosucto Eli');

    }

}
