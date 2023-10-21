<?php

namespace App\Http\Controllers;
use App\Models\Estado;

use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function show(string $id): View
    {
        echo "<B>".(Estado::find($id))->nombre."</B><br>";
        //$estados = Estados::all();
        //dd($estados);
    }


    public function MostrarEstados()
    {
        $estados = Estado::all();
        dd($estados);
    }


    public function index()
    {
       return view('estados.index');
    }

    public function getEstados()
    {
        return response() -> json(Estado::get());
    }
}
