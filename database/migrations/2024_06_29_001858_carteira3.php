<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carteiras', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('i_usuario');
            $table->foreign('i_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('tipo_transacao', ['deposito', 'retirada']);
            $table->decimal('valor', 10, 2);
            $table->timestamp('data_transacao')->useCurrent();
            $table->string('descricao')->nullable();
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
