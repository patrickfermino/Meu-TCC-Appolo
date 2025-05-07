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
        Schema::create('portfolio_artistas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')-> references('id')->on('usuarios')->onDelete('cascade');
            $table->string('nome_artistico')->nullable();
            $table->string('descricao')->nullable();
            $table->string('link_instagram', 2000)->nullable();
            $table->string('link_behance', 2000)->nullable();
            //incluir coluna de feedback -> padrao 5
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_artistas');
    }
};
