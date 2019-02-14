<?php
 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estadopedido;

class EstadospedidosController extends Controller
{
    // Funcion para listar los Estados de Pedido
    public function index()
    {
        $estados_pedidos = Estadopedido::Paginate(20);
        return view('admin.estadospedidos.index',compact('estados_pedidos'));
    }

    
    public function create()
    {
        //
    }

    //Función para guardar el estado del pedido
    public function store(Request $request)
    {
        // Validar campos
        $request->validate([
            'nombre'=>'required|unique:estados_pedidos'
        ]);

        // Gurdar en la base de datos
        $estado_pedido = Estadopedido::create([
            'nombre'=>$request->nombre
        ]);

        //Redireccionar
        return redirect()->route('estadospedidos.index')->with('mensaje','Estado Creado correctamente');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $estado_pedido = Estadopedido::find($id);
        $estados_pedidos = Estadopedido::Paginate(20);
        return view('Admin.estadospedidos.editar',compact('estado_pedido', 'estados_pedidos'));
    }

    
    public function update(Request $request, $id)
    {
        // Validar Datos
        $request->validate([
            'nombre'=>'required'
        ]);

        
        $estado_pedido = Estadopedido::find($id);
        $estado_pedido->nombre = $request->nombre;
        $estado_pedido->save();

        // Redireccionar
        return redirect()->route('estadospedidos.index')->with('mensaje','Estado Actualizado correctamente');
    }

    // Función para borrar un estado de pedido
    public function destroy($id)
    {
        $estado_pedido = Estadopedido::find($id);
        $estado_pedido->delete();

        // redirecciona
        return redirect()->route('estadospedidos.index')->with('mensdaje','Estado Eliminado Correctamente');
    }
}
