<?php

namespace App\Http\Controllers;
use App\Models\Negativos;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NegativosController extends Controller
{
    public function getDefunciones()
      {
          $negativos = Negativos::all();
          $totalCasos = $negativos->sum('CASOS');
          echo 'Casos Confirmados: ' . $totalCasos;
      }
  
  
      public function getCasosNegativosEstado($id)
      {
          $estado = Estado::find($id);
          $totalCasos = $estado->negativos->sum('CASOS');
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
          //self::getDefunciones();
          self::getCasosDesglosados();
      }
      
      public function show($id)
      {
          self::getCasosNegativosEstado($id);
      }
}
