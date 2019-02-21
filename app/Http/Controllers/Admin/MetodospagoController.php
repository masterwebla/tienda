<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metodopago;

class MetodospagoController extends Controller
{
    
    //Función para listar
    public function index()
    {
        $metodos = Metodopago::paginate(10);
        return view('admin.metodos.index',compact('metodos'));
    }

    //Función para guardar
    public function store(Request $request)
    {
        //Validar datos

        //Insertar datos
        $metodo = Metodopago::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);

        return $metodo;
    }

    //Función para desplegar el formulario para editar
    public function edit($id)
    {
        $metodo = Metodopago::find($id);
        return $metodo;
    }

    
    public function update(Request $request, $id)
    {
        //Validar

        //Actualizar Datos
        $metodo = Metodopago::find($id);
        $metodo->nombre = $request->nombre;
        $metodo->descripcion = $request->descripcion;
        $metodo->save();

        return redirect()->route('metodos.index')->with('mensaje','Método actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
