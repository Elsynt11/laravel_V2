<?php

namespace App\Http\Controllers;
use App\Models\Sospechosos;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SospechososController extends Controller
{

    public function getSospechosos()
    {
        $sospechosos = Sospechosos::all();
        $totalCasos = $sospechosos->sum('CASOS');
        echo 'Casos Confirmados: ' . $totalCasos;
    }


    public function getCasosSospechososEstado($id)
    {
        $estado = Estado::find($id);
        $totalCasos = $estado->sospechosos->sum('CASOS');
        echo 'CASOS NEGATIVOS DE <b>' . $estado->NOMBRE . "</b> : ". $totalCasos ;
    }

    public function getCasosDesglosados()
    {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach($estados as $estado)
        {
            $casosE = $estado->negativos->sum("CASOS");
            $totalCasos += $casosE;
            echo "Casos por el estado <b>" . $estado->NOMBRE . "</b> : " . $casosE . "<br>";  
        }
        echo "Casos totales negativos " . $totalCasos;
    }


    public function index()
    {
        //self::getSospechosos();
        self::getCasosDesglosados();
    }
    
    public function show($id)
    {
        self::getCasosSospechososEstado($id);
    }
}
