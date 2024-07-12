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
            //$table->foreign('i_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('nicho',['saude física', 'saude mental','outro','lazer','educacao']);
            $table->enum('formato_produto',['digital','sowftare','físico']);
            $table->enum('idioma',['pt-br','eng','fr']);
            $table->enum('moeda',['real','euro','dolar']);
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
