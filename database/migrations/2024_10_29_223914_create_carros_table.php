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
        Schema::create('carros', function (Blueprint $table) {
            $table->string('placa', 10);
            $table->integer('quilometragem');
            $table->string('modelo', 50);
            $table->string('marca', 50);
            $table->timestamps();
        });
    }

};
