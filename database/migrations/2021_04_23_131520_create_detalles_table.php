<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre",100);
            $table->string("Descripcion",200);
        });
        Schema::table('detalles', function (Blueprint $table) {
            $table->unsignedBigInteger("id_consulta");
            $table->unsignedBigInteger("id_pedido");
            $table->unsignedBigInteger("id_proveedor");
            $table->foreign("id_consulta")->references("id")->on("consultas")->cascadeOnDelete() ;
            $table->foreign("id_pedido")->references("id")->on("pedidos")->cascadeOnDelete();
            $table->foreign("id_proveedor")->references("id")->on("proveedors")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
