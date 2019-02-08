<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Estadoproducto;

class ProductosController extends Controller
{
    //Función para listar los productos
    public function index()
    {
        $productos = Producto::paginate(20);
        return view('admin.productos.index',compact('productos'));
    }

    //Función para mostrar el formulario para crear un nuevo perfil
    public function create()
    {
        $estados = Estadoproducto::pluck('nombre','id');
        return view('admin.productos.crear',compact('estados'));
    }

    //Función para guardar el perfil
    public function store(Request $request)
    {
        //Validar campos
        $request->validate([
            'nombre'=>'required|unique:productos',
            'cantidad'=>'required|numeric',
            'precio'=>'required|numeric',
            'descripcion'=>'required'
        ]);

        //Guardar en la Base de Datos
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'cantidad'=>$request->cantidad,
            'precio'=>$request->precio,
            'descripcion'=>$request->descripcion,
            'descripcion_detallada'=>$request->descripcion_detallada,
            'estado_id'=>$request->estado_id,
        ]);

        //Redireccionar
        return redirect()->route('productos.index')->with('mensaje','Producto creado correctamente');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $estados = Estadoproducto::pluck('nombre','id');
        $producto = Producto::find($id);
        return view('admin.productos.editar',compact('producto','estados'));
    }

    //Función para actualizar el perfil
    public function update(Request $request, $id)
    {
        //Validar datos
        $request->validate([
            'nombre'=>'required',
            'cantidad'=>'required|numeric',
            'precio'=>'required|numeric',
            'descripcion'=>'required'
        ]);

        //Actualizar
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_detallada = $request->descripcion_detallada;
        $producto->estado_id = $request->estado_id;
        $producto->save();

        //Redireccionar
        return redirect()->route('productos.index')->with('mensaje','Producto actualizado correctamente');

    }

    //Función para borrar un perfil
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        //Redireccionar
        return redirect()->route('productos.index')->with('mensaje','Producto borrado correctamente');
    }
}
