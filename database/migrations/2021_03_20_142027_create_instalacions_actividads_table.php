<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalacionsActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacions_actividads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('instalacion_id');
            $table->double('cantidad', 9,2);
            $table->double('costo_de_instalacion', 9,2);
            $table->timestamps();
            $table->foreign('actividad_id')
                ->references('id')
                ->on('actividads')
                ->onDelete('cascade');
            $table->foreign('instalacion_id')
                ->references('id')
                ->on('instalacions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalacions_actividads');
    }
}
