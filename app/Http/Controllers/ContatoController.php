<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    public function index() {
        $contatos = Contato::all();
        return response()->json($contatos, 200);
    }

    public function store(ContatoRequest $request) {
        Contato::create($request->validated());
        return response()->json(200);
    }

    public function update(ContatoRequest $request) {
        $contatos = Contato::findOrFail($request->id);
        $contatos->fill($request->validated());
        $contatos->save();
        return response()->json('Contato alterado!', 200);
    }

    public function delete(Request $request) {
        $contatos = Contato::findOrFail($request->id);
        $contatos->delete();
        return response()->json('Contato deletado!', 200);
    }
}
