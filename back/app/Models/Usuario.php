<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'email', 'password', 'apodo', 'admin', 'rol'];

    protected $table = 'usuarios';

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean', // Añadir este campo
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
