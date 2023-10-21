<?php

namespace App\Http\Controllers;
use App\Models\Defunciones;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DefuncionesController extends Controller
{
    public function getDefunciones()
      {
          $defunciones = Defunciones::all();
          $totalCasos = $defunciones->sum('CASOS');
          echo 'Casos Confirmados: ' . $totalCasos;
      }
  
  
      public function getCasosDefuncionesEstado($id)
      {
          $estado = Estado::find($id);
          $totalCasos = $estado->defunciones->sum('CASOS');
          echo 'CASOS CONFIRMADOS DE <b>' . $estado->NOMBRE . "</b> : ". $totalCasos ;
      }
  
      public function getCasosDesglosados()
      {
          $estados = Estado::all();
          $totalCasos = 0;
          foreach($estados as $estado)
          {
              $casosE = $estado->defunciones->sum("CASOS");
              $totalCasos += $casosE;
              echo "Casos por el estado <b>" . $estado->NOMBRE . "</b> : " . $casosE . "<br>";  
          }
          echo "Casos totales confirmados " . $totalCasos;
      }
  
      public function index()
      {
          //self::getDefunciones();
          self::getCasosDesglosados();
      }
      
      //ejemplo profe
      public function show($id)
      {
          self::getCasosDefuncionesEstado($id);
      }
}
