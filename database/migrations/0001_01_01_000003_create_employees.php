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
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id(); // Chave primária (ID)
                $table->string('first_name'); // Primeiro nome
                $table->string('last_name'); // Sobrenome
                $table->string('email')->unique(); // Email, único
                $table->string('phone')->nullable(); // Telefone (opcional)
                $table->date('date_of_birth'); // Data de nascimento
                $table->string('address'); // Endereço
                $table->string('position'); // Cargo
                $table->decimal('salary', 10, 2); // Salário
                $table->enum('status', ['active', 'inactive']); // Status do funcionário (ativo ou inativo)
                $table->timestamps(); // Created_at e updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
