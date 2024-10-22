<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Str;
class EventoController extends Controller
{

    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros = Evento::All();
        return view('evento.index',compact(['registros','texto']));
    }


    public function create()
    {
        $evento = new Evento();
        return view('evento.action',['evento'=>new Evento()]);
    }


    public function store(Request $request)
    {
        
    }


    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
