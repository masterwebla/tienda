<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfil;

class PerfilesController extends Controller
{
    //Función para listar los perfiles
    public function index()
    {
        $perfiles = Perfil::paginate(20);
        return view('admin.perfiles.index',compact('perfiles'));
    }

    //Función para mostrar el formulario para crear un nuevo perfil
    public function create()
    {
        return view('admin.perfiles.crear');
    }

    //Función para guardar el perfil
    public function store(Request $request)
    {
        //Validar campos
        $request->validate([
            'nombre'=>'required|unique:perfiles'
        ]);

        //Guardar en la Base de Datos
        $perfil = Perfil::create([
            'nombre'=>$request->nombre
        ]);

        //Redireccionar
        return redirect()->route('perfiles.index')->with('mensaje','Perfil creado correctamente');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $perfil = Perfil::find($id);
        return view('admin.perfiles.editar',compact('perfil'));
    }

    //Función para actualizar el perfil
    public function update(Request $request, $id)
    {
        //Validar datos
        $request->validate([
            'nombre'=>'required'
        ]);

        //Actualizar
        $perfil = Perfil::find($id);
        $perfil->nombre = $request->nombre;
        $perfil->save();

        //Redireccionar
        return redirect()->route('perfiles.index')->with('mensaje','Perfil actualizado correctamente');

    }

    //Función para borrar un perfil
    public function destroy($id)
    {
        $perfil = Perfil::find($id);
        $perfil->delete();

        //Redireccionar
        return redirect()->route('perfiles.index')->with('mensaje','Perfil borrado correctamente');
    }
}
