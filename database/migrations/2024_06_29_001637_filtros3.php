<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filtros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('i_produto');
            //$table->foreign('i_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nicho');
            $table->string('formato_produto');
            $table->string('idioma');
            $table->string('moeda');
            $table->boolean('afiliados');
            $table->string('tipo_comissao')->default(0);
            $table->boolean('hotlink_alternativos')->default(0);
            $table->boolean('premio_afiliado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
