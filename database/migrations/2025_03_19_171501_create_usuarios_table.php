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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('documento')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('codigo_email')->nullable(); 
            $table->unsignedBigInteger('sexo_usuario')->nullable();
            $table->foreign('sexo_usuario')-> references('id')->on('sexo_usuario')->onDelete('cascade');
            $table->string('senha');
            $table->rememberToken();
            $table->unsignedBigInteger('tipo_usuario')->nullable();
            $table->foreign('tipo_usuario')-> references('id')->on('tipo_usuario')->onDelete('cascade');
            $table->date('data_nasc');
            $table->string('cep')->nullable();
            $table->string('bairro')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->softDeletes();
            $table->timestamps();
            //incluir coluna de feedback -> padrao 5

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
