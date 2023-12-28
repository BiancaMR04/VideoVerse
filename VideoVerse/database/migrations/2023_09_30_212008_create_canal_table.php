<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanaisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canais', function (Blueprint $table) {
            $table->id();
$table->foreignId('user_id')->constrained(); // Chave estrangeira para a tabela users
            $table->string('nome');
            $table->text('descricao');
            $table->timestamp('data_de_cadastro')->useCurrent();
            $table->json('categorias')->default('[]');
            $table->integer('inscritos')->default(0);
            $table->string('imagem_foto');
            $table->string('imagem_fundo');
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canais');
    }
}
