<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContatoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pessoa', [PessoaController::class, 'index']);
Route::post('pessoa', [PessoaController::class, 'store']);
Route::put('pessoa/{id}', [PessoaController::class, 'update']);
Route::delete('pessoa/{id}', [PessoaController::class, 'delete']);

Route::get('contatos', [ContatoController::class, 'index']);
Route::post('contatos', [ContatoController::class, 'store']);
Route::put('contatos/{id}', [ContatoController::class, 'update']);
Route::delete('contatos/{id}', [ContatoController::class, 'delete']);

Route::post('/suporte', function (Request $request) {
    $expr = str_split($request->input('expr'));
    $stack = [];

    for($i = 0; $i < count($expr); $i++)
    {
        $x = $expr[$i];

        if ($x == '(' || $x == '[' || $x == '{')
        {
          array_push($stack, $x);
          continue;
        }

        if (count($stack) == 0) {
          return false;
        }

        $check = '';
        switch ($x){
          case ')':
            $check = array_pop($stack);
              if ($check == '{' || $check == '[')
                  return response()->json('Expressão Não Balanceada!', 200);
              break;

          case '}':
            $check = array_pop($stack);
              if ($check == '(' || $check == '[')
                  return response()->json('Expressão Não Balanceada!', 200);
              break;

          case ']':
            $check = array_pop($stack);
              if ($check == '(' || $check == '{')
                  return response()->json('Expressão Não Balanceada!', 200);
              break;
        }
    }

    if (count($stack) == 0) {
      return response()->json('Expressão Balanceada!', 200);
    } else {
      return response()->json('Expressão Não Balanceada!', 200);
    }
});
