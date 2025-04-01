<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $comentarios = Comentario::select('usuario_id', 'created_at', 'contenido')->get();
        return response()->json($comentarios);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contenido' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Errores en validación',
                'errores' => $validator->errors()
            ], 442);
        }

        Comentario::create([
            'usuario_id' => $request->user()->id,
            'contenido' => $request->contenido,
        ]);

        return response()->json(['mensaje' => 'Comentario creado correctamente'], 201);
    }
}
