<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Nota;

use App\Grado;
use App\Clase;
use App\Matricula;
use App\Alumno;

class ReporteNotaController extends Controller
{
    //

    public function reporteCuadros(Request $request){
        $year = $request->year;
        $grado = Grado::find( $request->gradoId);
        $grados = Grado::all();
        $matriculas = Matricula::where('grado_id',$request->gradoId)->where('ano',$year)->get();

        return view('Notas.reporteCuadros')->with('matriculas',$matriculas)->with('grados',$grados)->with('gradoId',$request->gradoId)->with('year',$year)->with('grado',$grado);
    }

    public function boletaCalficaciones(Request $request){

        $notas = Nota::where('matricula_id', $request->matriculaId)->get();
        $alumno = Alumno::find($request->alumnoId);

        return view('Notas.calificaiones')->with('notas',$notas)->with('alumno',$alumno);
    }
}
