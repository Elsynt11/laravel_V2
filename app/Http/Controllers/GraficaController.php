<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Confirmados;
use App\Models\Negativos;
use App\Models\Defunciones;
use App\Models\Sospechosos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficaController extends Controller
{
    public function index ()
    {
        //return view('views.chart');
    }

   public function casos()
   {
        $totalCasosConfirmados = Confirmados::sum('CASOS');
        $totalCasosNegativos = Negativos::sum('CASOS');
        $totalCasosSospechosos = Sospechosos::sum('CASOS');
        $totalDefunciones = Defunciones::sum('CASOS');

        return view('Graficas.chart', compact( 'totalCasosConfirmados', 'totalCasosSospechosos', 'totalCasosNegativos', 'totalDefunciones'));
   }

   
   public function top()
   {
    $top5CasosConfirmados = Confirmados::join('estados', 'estados.ID', '=', 'confirmados.ESTADO_ID')
            ->select('estados.NOMBRE as Estado', 'confirmados.fecha',)
            ->orderBy('confirmados.CASOS', 'desc') // Ordena por la cantidad de casos en orden descendente
            ->orderBy('confirmados.fecha', 'desc') // Ordena por fecha en orden descendente
            ->limit(5) // Limita a los 5 registros más altos
            ->get();
        return view('Graficas.top', compact('top5CasosConfirmados', ));
   }
}

/**
 * 
 * Adicional deberán implementar una tabla con el top 5 de confirmados, sospechosos, defunciones y negativos por mes de todo el periodo de covid
 */