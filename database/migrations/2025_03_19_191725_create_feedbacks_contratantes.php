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
        Schema::create('feedbacks_contratantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')-> references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('id_usuario_avaliador');
            $table->foreign('id_usuario_avaliador')-> references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('nota');
            $table->string('comentario');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks_contratantes');
    }
};
