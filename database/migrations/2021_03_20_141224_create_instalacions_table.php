<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('uservicio_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('fecha');
            $table->double('sub_total', 9,2);
            $table->double('utilidad', 9,2);
            $table->double('igv', 9,2);
            $table->double('monto_total', 9,2);
            $table->timestamps();
            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipodeinstalacions')
                ->onDelete('cascade');
            $table->foreign('uservicio_id')
                ->references('id')
                ->on('usuario_del_servicios')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('instalacions');
    }
}
