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
        return redirect()->route('perfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
