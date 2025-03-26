<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('password')->after('contraseña'); // Crear nueva columna
        });

        // Copiar los datos de 'contraseña' a 'password'
        DB::table('usuarios')->update([
            'password' => DB::raw('contraseña')
        ]);

        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('contraseña'); // Eliminar la columna antigua
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('contraseña')->after('password'); // Restaurar la columna antigua
        });

        // Copiar los datos de 'password' a 'contraseña'
        DB::table('usuarios')->update([
            'contraseña' => DB::raw('password')
        ]);

        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('password'); // Eliminar la columna nueva
        });
    }
};
