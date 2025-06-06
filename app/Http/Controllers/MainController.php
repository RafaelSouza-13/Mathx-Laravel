<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View{
        return view('home');
    }

    
    public function generateExercises(Request $request): View{
        // Validação
        $this->validInputExercices($request);

        // Operações
        $operations = $this->getOperations($request);

        // genera exercicios
        $exercises = $this->generate($request, $operations);
        
        // Abrindo uma sessão
        session(['exercises' => $exercises]);
        // ou
        // $request->session()->put('exercises', $exercices);
        return view('operations', ['exercises' => $exercises]);
    }

    public function printExercises(){
        // checa sessao
        if(!session()->has('exercises')){
            return redirect()->route('home');
        }

        $exercices = session('exercises');
        echo '<pre>';
        echo '<h1>Exercícios de Matemática (' .env('APP_NAME') . ')</h1>';
        echo '<hr>';

        foreach($exercices as $exercise){
            echo '<h2><small>' . $exercise['exercise_number'] . ') </small>' . $exercise['exercise'] . '</h2>';
        }

        // soluções
        echo '<hr>';
        echo '<small>Soluçõesecho</small><br>';
        foreach($exercices as $exercise){
            echo '<small>' . $exercise['exercise_number'] . ')' . $exercise['sollution'] . '</small><br>';
        }
    }

    public function exportExercises(){
        // checa sessao
        if(!session()->has('exercises')){
            return redirect()->route('home');
        }
        // criar um arquivo para download dos exercicios
        $exercises = session('exercises');
        $filename = 'exercises_' . env('APP_NAME') . '_' . date('YmdHis') . '.txt';
        $content = '';
        foreach ($exercises as $exercise) {
            $content .= $exercise['exercise_number'] . ') ' . $exercise['exercise'] . "\n";
        }

        // soluções
        $content .= "\n";
        $content .= "Soluções\n" . str_repeat('-', 20) . "\n";
        foreach ($exercises as $exercise) {
            $content .= $exercise['exercise_number'] . ') ' . $exercise['sollution'] . "\n";
        }

        return response($content)
                ->header('Content-Type', 'text/plain')
                ->header('Content-Disposition', 'attachment; filename="'. $filename .'"');
    }

    private function validInputExercices(Request $request): void{
        $request->validate([
            'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
            'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
            'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
            'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',
            'number_one' => 'required|integer|min:0|max:999|lt:number_two',
            'number_two' => 'required|integer|min:0|max:999',
            'number_exercises' => 'required|integer|min:5|max:50',
        ]);
    }

    private function getOperations(Request $request): array{
        $operations = [];
        if($request->check_sum){
            $operations[] = 'sum';
        }

        $operations = [];
        if($request->check_subtraction){
            $operations[] = 'subtraction';
        }

        if($request->check_multiplication){
            $operations[] = 'multiplication';
        }

        if($request->check_division){
            $operations[] = 'division';
        }
        return $operations;
    }

    private function generate(Request $request, array $operations): array{
        // minimos e maximo
        $min = $request->number_one;
        $max = $request->number_two;

        // numeros de exercicios
        $numberExercices = $request->number_exercises;

        $exercices = [];
        for($index = 1; $index <= $numberExercices; $index++){
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
                    $exercise = "$number1 x $number2 = ";
                    $solluction = $number1 * $number2;
                    break;
                case 'division':
                    // corrigindo divisao por 0
                    if($number2 == 0){
                        $number2 = 1;
                    }
                    $exercise = "$number1 : $number2 = ";
                    $solluction = $number1 / $number2;
                    break;
                default:
                    # code...
                    break;
            }

            // Se o resultado é um float, arrendondar para quatro casas decimais
            if(is_float($solluction)){
                $solluction = round($solluction, 4);
            }
            $exercices[] = [
                'operation' => $operation,
                'exercise_number' => str_pad($index, 2, 0, STR_PAD_LEFT),
                'exercise' => $exercise,
                'sollution' => "$exercise $solluction",
            ];
        }
        return $exercices;
    }
}
