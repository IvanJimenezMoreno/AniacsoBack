<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'email', 'contraseña', 'apodo', 'admin'];

    protected $table = 'usuarios';

    protected $hidden = [
        'contraseña'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean', // Añadir este campo
    ];
}
