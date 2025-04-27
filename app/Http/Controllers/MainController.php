<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View{
        return view('home');
    }

    public function generateExercises(Request $request){
        echo "Gerar exercicios";
    }

    public function printExercises(){
        echo "Imprimir exercicios";
    }

    public function exportExercises(){
        echo "Exportar exercicios para um arquivo de texto";
    }
}
