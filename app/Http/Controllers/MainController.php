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
        // Validação
        $request->validate([
            'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
            'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
            'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
            'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',
            'number_one' => 'required|integer|min:0|max:999|lt:number_two',
            'number_two' => 'required|integer|min:0|max:999',
            'number_exercises' => 'required|integer|min:5|max:50',
        ]);

        // Operações
        $operations = [];
        $operations[] = $request->check_sum ? 'sum' : '';
        $operations[] = $request->check_subtraction ? 'subtraction' : '';
        $operations[] = $request->check_multiplication ? 'multiplication' : '';
        $operations[] = $request->check_division ? 'division' : '';

        // minimos e maximo
        $min = $request->number_one;
        $max = $request->number_two;

        // numeros de exercicios
        $numerExercices = $request->number_exercises;

        // genera exercicios
        $exercices = [];
        for($index = 1; $index <= $numerExercices; $index++){
            $operation = $operations[array_rand($operations)];
            $number1 = rand($min, $max);
            $number2 = rand($min, $max);

            $exercise = '';
            $solluction = '';

            switch ($operation) {
                case 'sum':
                    $exercise = "$number1 + $number2 = ";
                    $solluction = $number1 + $number2;
                    break;
                case 'subtraction':
                    $exercise = "$number1 - $number2 = ";
                    $solluction = $number1 - $number2;
                    break;
                case 'multiplication':
                    $exercise = "$number1 * $number2 = ";
                    $solluction = $number1 * $number2;
                    break;
                case 'division':
                    $exercise = "$number1 / $number2 = ";
                    $solluction = $number1 / $number2;
                    break;
                default:
                    # code...
                    break;
            }
            $exercices[] = [
                'exercise_number' => $index,
                'exercise' => $exercise,
                'sollution' => "$exercise $solluction",
            ];
        }

        dd($exercices);
    }

    public function printExercises(){
        echo "Imprimir exercicios";
    }

    public function exportExercises(){
        echo "Exportar exercicios para um arquivo de texto";
    }
}
