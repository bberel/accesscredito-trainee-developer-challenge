<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Http\Resources\Usuario as UsuarioResource;
use App\Http\Resources\UsuarioCollection;

class UsuarioController extends Controller
{
    public function index()
    {
        return new UsuarioCollection(Usuario::all());
    }

    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'required|max:14',
            'data_nascimento' => 'required',
            'email' => 'required|max:100',
            'telefone' => 'required|max:20',
            'endereco' => 'required|max:100',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:50',
            'cep' => 'required',
        ]);

        $usuario = Usuario::create($request->all());

        return (new UsuarioResource($usuario))
                ->response()
                ->setStatusCode(201);
    }

    public function update(Usuario $usuario, Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'required|max:14',
            'data_nascimento' => 'required',
            'email' => 'required|max:100',
            'telefone' => 'required|max:20',
            'endereco' => 'required|max:100',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:50',
            'cep' => 'required',
        ]);

        $updated = $usuario->fill($request->all());
        $updated->save();

        return (new UsuarioResource($updated))
                ->response()
                ->setStatusCode(201);
    }

    public function delete(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json(null, 204);
    }
}
