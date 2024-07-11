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
        Schema::create('conteudoproduto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('i_produto');
            $table->foreign('i_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo conteudo');
            $table->string('descricao conteudo');
            $table->longText('video conteudo');
            $table->longText('arquivo conteudo');
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
