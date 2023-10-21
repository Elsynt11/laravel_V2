<?php

namespace App\Http\Controllers;
use App\Models\Confirmados;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConfirmadosController extends Controller
{

    public function getCasosConfirmados()
    {
        $confirmados = Confirmados::all();
        $totalCasos = $confirmados->sum('CASOS');
        echo 'Casos Confirmados: ' . $totalCasos;
    }


    public function getCasosConfirmadosEstado($id)
    {
        /*
        $estado = Estado::find($id);
        $casosEstados = Confirmados::where('ESTADO_ID', '=', $id);
        $totalCasos = $casosEstados->sum('CASOS');
        echo 'CASOS CONFIRMADOS DE ' . $estado->nombre . ': '. $totalCasos ;
        */

        $estado = Estado::find($id);
        $totalCasos = $estado->confirmados->sum('CASOS');
        echo 'CASOS CONFIRMADOS DE <b>' . $estado->NOMBRE . "</b> : ". $totalCasos ;
    }

    public function getCasosDesglosados()
    {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach($estados as $estado)
        {
            $casosE = $estado->confirmados->sum("CASOS");
            $totalCasos += $casosE;
            echo "Casos por el estado <b>" . $estado->NOMBRE . "</b> : " . $casosE . "<br>";  
        }
        echo "Casos totales confirmados " . $totalCasos;
    }


    public function index()
    {
        //self::getCasosConfirmados();
        self::getCasosDesglosados();
    }
    
    
    //ejemplo profe

    public function show($id)
    {
        self::getCasosConfirmadosEstado($id);
    }
}
