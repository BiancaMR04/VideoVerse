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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('caminho');
            $table->string('caminho_imagem');
            $table->timestamp('data');
            $table->integer('visualizacao')->default(0);
            $table->string('titulo');
            $table->text('descricao');
            $table->unsignedBigInteger('canal_id');
            $table->foreign('canal_id')->references('id')->on('canal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
