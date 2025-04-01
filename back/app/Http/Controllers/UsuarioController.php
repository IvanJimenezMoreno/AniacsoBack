<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function getApodo($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario) {
            return response()->json(['apodo' => $usuario->apodo]);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }
}
