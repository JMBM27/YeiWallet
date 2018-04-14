<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddreesBtc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_btc', function (Blueprint $table) {
            $table->string('address',35);
            $table->string('guid',36);
            $table->string('label',100)->nullable();
            $table->string('priv_key',54)->nullable();
            $table->string('password',30);
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->primary('usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_btc');
    }
}
