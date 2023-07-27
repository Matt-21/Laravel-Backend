<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    public function index() {
        $Pessoas = Pessoa::with('contatos')->get();
        return response()->json($Pessoas, 200);
    }

    public function store(PessoaRequest $request) {
        Pessoa::create($request->validated());
        return response()->json(200);
    }

    public function update(PessoaRequest $request) {
        $Pessoass = Pessoa::findOrFail($request->id);
        $Pessoass->fill($request->validated());
        $Pessoass->save();
        return response()->json('Pessoa alterada!', 200);
    }

    public function delete(Request $request) {
        $Pessoass = Pessoa::findOrFail($request->id);
        $Pessoass->delete();
        return response()->json('Pessoa deletada!', 200);
    }
}
