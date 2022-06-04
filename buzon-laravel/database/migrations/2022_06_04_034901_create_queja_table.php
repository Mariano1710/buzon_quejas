<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queja', function (Blueprint $table) {
            $table->id();
            $table->string('Nombrecompleto');
            $table->integer('Telefono');
            $table->string('Correo')->unique();
            $table->string('Queja');
            $table->string('Departamento');
            $table->boolean('estatus');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queja');
    }
};
