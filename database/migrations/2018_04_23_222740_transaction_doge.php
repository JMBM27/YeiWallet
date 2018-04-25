<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionDoge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_doge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('txid');
            $table->integer('tipo');
            $table->string('address',35);
            $table->double('monto');
            $table->boolean('confirmacion');
            $table->timestamp('fecha');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_doge');
    }
}
