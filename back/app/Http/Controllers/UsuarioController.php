<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'contraseña' => 'required|min:8|confirmed',
            'apodo' => 'required|string|unique:usuarios,apodo'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Errores en validación',
                'errores' => $validator->errors()
            ], 442);
        }



        Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'contraseña' => Hash::make($request->contraseña),
            'apodo' => $request->apodo

        ]);

        return response()->json(['mensaje' => 'Usuario registrado correctamente'], 201);
    }
}
