<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $busqueda = $request->buscar;
        $registro = Registro::where('numero_documento', 'LIKE', '%'.$busqueda.'%')
        ->orwhere('tipo', 'LIKE', '%'.$busqueda.'%')
        ->paginate(7);
        return view('registro.index', compact('registro', 'busqueda'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('registro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        
    $validar= Validator::make($request->all(), [
    'numero_documento'=> 'required',
    'tipo'=> 'required'
    ]);
    if(!$validar ->fails()){
    $registro=new Registro();
    $registro->numero_documento=$request->numero_documento;
    $registro->tipo=$request->tipo;
    $registro->save();
        if ($registro) {
            Alert::success('REALIZADO', 'Registo Guardado');
            return redirect('/registro');
}
}
else {
    Alert::error('Failed', 'Registo no Guardado');
    return redirect('/registro/create');
}


}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Registro::find($id);
        return view('registro.edit')->with('registro', $registro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        $registro=Registro::find($id);
        $registro->numero_documento = $request->numero_documento;
        
        $registro->tipo = $request->tipo;

        $registro->save();

        return redirect('/registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Registro::destroy($id);
        return redirect('/registro');
    }
}
