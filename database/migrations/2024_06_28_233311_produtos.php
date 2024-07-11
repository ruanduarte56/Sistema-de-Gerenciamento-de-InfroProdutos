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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('slug');
            $table->unsignedBigInteger('i_usuario');
            $table->foreign('i_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('descricao');
            $table->double('preco');
            $table->decimal('porcetagem_afiliacao',2,2)->default(0); 
            $table->longText('imagem');
            $table->text('pagina_de_vendas');
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
