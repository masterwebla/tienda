<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Imagenproducto;

class ImagenesController extends Controller
{
    
    public function index($id)
    {
        $producto = Producto::find($id);
        $imagenes = Imagenproducto::where('producto_id',$id)->get();
        return view('admin.imagenes.index',compact('producto','imagenes'));
    }

    
    public function store(Request $request)
    {
        //Validar

        //Subir el archivo del computador a la carpeta public

        //Insertar en el Imagenesproducto


        //Redireccionar a la vista 
    }

    
    
    public function destroy($id)
    {
        //
    }
}
