<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Imagenproducto;
use File;

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
        $request->validate([
            'producto_id'=>'required',
            'archivo' => 'mimes:jpeg,bmp,png'
        ]);

        //Subir el archivo del computador a la carpeta public
        $archivo = $request->file('archivo');
        $ruta = public_path().'/imgproductos';
        $nombreimg = $request->producto_id."-".uniqid()."-".$archivo->getClientOriginalName();
        $archivo->move($ruta,$nombreimg);


        //Insertar en el Imagenesproducto
        $imagen = Imagenproducto::create([
            'archivo' => $nombreimg,
            'producto_id' => $request->producto_id
        ]);

        //Validacion de imagen guardada para definir un mensaje
        $mensaje = $imagen?'Imagen subida correctamente':'No se pudo subir la imagen';

        //Redireccionar a la vista
        return back()->with('mensaje',$mensaje);
    }

    //Función para borrar el registro de la imagen y el archivo
    public function destroy($id)
    {
        $imagen = Imagenproducto::find($id);

        //Borrar el archivo
        $mensaje = "No se pudo borrar el archivo";
        $ruta = public_path().'/imgproductos/'.$imagen->archivo;
        $borrada = File::delete($ruta);
        //Borrar el resgistro en la tabla
        if($borrada){
            $imagen->delete();
            $mensaje = "Imagen borrada correctamente";
        }

        //Redireccionar a la vista
        return back()->with('mensaje',$mensaje);

    }
}
