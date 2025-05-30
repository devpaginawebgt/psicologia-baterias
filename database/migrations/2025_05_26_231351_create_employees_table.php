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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->string('name');
            $table->string('phone_number');
            $table->date('birthday');
            $table->enum('genre', ['Masculino', 'Femenino']);
            $table->string('birthplace');
            $table->enum('academic_level', ['Primaria', 'Secundaria', 'Preparatoria', 'Universidad', 'Posgrado']);
            $table->enum('marital_status', ['Casado', 'Divorciado', 'Viudo', 'Union libre']);
            $table->integer('children');
            $table->integer('people_depending');
            $table->boolean('uses_transportation');
            $table->date('hiring_date');
            $table->enum('shift', ['Matutino', 'Vespertino', 'Nocturno', 'Mixto']);
            $table->integer('branch_number');
            $table->string('branch_address');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
