<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Incluir Mail y ProductoCreado para poder enviar el mail
use Illuminate\Support\Facades\Mail;
//Incluir App para generar el PDF
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Mail\ProductoCreado;
use App\Producto;
use App\Estadoproducto;
use App\Imagenproducto;

class ProductosController extends Controller
{
    //Función para listar los productos con filtros
    public function index(Request $request)
    {
        $nombre = $request->nombre;
        $precio = $request->precio;
        $estado_id = $request->estado_id;
        $paginas = 20;
        if($request->paginas)
            $paginas = $request->paginas;
        $productos = Producto::nombre($nombre)->precio($precio)->estado($estado_id)->paginate($paginas);
        $estados = Estadoproducto::pluck('nombre','id');
        return view('admin.productos.index',compact('productos','estados'));
    }

    //Función para mostrar el formulario para crear un nuevo perfil
    public function create()
    {
        $estados = Estadoproducto::pluck('nombre','id');
        return view('admin.productos.crear',compact('estados'));
    }

    //Función para guardar el producto
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

        //Enviar el mail de Nuevo Producto Creado
        $nombrep = $producto->nombre;
        $cantidadp = $producto->cantidad;
        $preciop = $producto->precio;
        Mail::to('mauricio.rodriguez1016@gmail.com')->send(new ProductoCreado($nombrep,$cantidadp,$preciop));


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
        //Borrar imágenes del producto
        $imagenes = Imagenproducto::where('producto_id',$id)->delete();

        //Borrar el producto
        $producto->delete();

        //Redireccionar
        return redirect()->route('productos.index')->with('mensaje','Producto borrado correctamente');
    }

    //Función para generar PDF de productos
    public function generarPDF(Request $request){
        $nombre = $request->nombre;
        $precio = $request->precio;
        $productos = Producto::nombre($nombre)->precio($precio)->get();
        $pdf = App::make('dompdf.wrapper');
        $vista = View::make('admin.pdfs.productos',compact('productos'));
        $pdf->loadHTML($vista);
        //Stream para que abra el PDF en el navegador
        //return $pdf->stream('productos');
        //Download para que descargue el PDF
        return $pdf->download('productos.pdf');
    }
}
