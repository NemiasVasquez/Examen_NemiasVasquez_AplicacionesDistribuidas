<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Str;
use App\Models\Evento;
class EntradaController extends Controller
{
 
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));

        $registros = Entrada::with('evento')->where('dni','LIKE','%'.$texto.'%')->paginate(5);

        return view('entrada.index', compact(['registros', 'texto']));
    }

 
    public function create()
    {
        $entrada = new Entrada();
        $eventos=Evento::All();
        return view('entrada.action',compact('entrada','eventos'));
    }


    public function store(Request $request)
    {
        try {
            $registro = new Entrada();
            $registro->evento_id = $request->input('evento_id');
            $registro->pago = $request->input('pago');
            $registro->dni = $request->input('dni');
            $registro->save();
            return redirect()->route('entrada.index')->with('mensaje','Registro '.$registro->dni.' se ha  creado safistactoriamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('entrada.index')->with('error','No se puede crear el registro');
        }
    }


    public function show(string $id)
    {
    
    }


    public function edit(string $id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('entrada.action',compact('entrada'));
    }


    public function update(Request $request, string $id)
    {
        try {
            $registro = Entrada::findOrFail($id);
            $registro->evento_id = $request->input('evento_id');
            $registro->pago = $request->input('pago');
            $registro->dni = $request->input('dni');
            $registro->save();
            return redirect()->route('entrada.index')->with('mensaje','Registro '.$registro->dni.'se ha Actualizado safistactoriamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('entrada.index')->with('error','No se puede Actuaizar el registro');
        }
    }

    public function destroy(string $id)
    {
        try {
            $registro=Entrada::findOrFail($id);
            $registro->delete();
            return redirect()->route('entrada.index')->with('mensaje','Registro '.$registro->nombre.' eliminado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('entrada.index')->with('error','No se puede eliminar el registro '.$registro->nombre.' porque esta siendo usado.');
        }
    }
}
