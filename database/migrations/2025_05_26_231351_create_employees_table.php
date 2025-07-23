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

            $table->foreignId('company_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('lastname');
            $table->string('phone_number');
            $table->date('birthdate');
            $table->enum('genre', ['Masculino', 'Femenino']);
            
            $table->foreignId('division_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('academic_level', ['Primaria', 'Secundaria', 'Preparatoria', 'Universidad', 'Posgrado']);
            $table->enum('marital_status', ['Soltero(a)', 'Casado(a)', 'Divorciado(a)', 'Viudo(a)', 'Union libre(a)']);
            $table->integer('children');
            $table->integer('people_depending');
            $table->enum('transportation', ['Auto', 'Transporte Publico']);
            $table->date('hiring_date');
            $table->enum('shift', ['Matutino', 'Vespertino', 'Nocturno', 'Mixto'])->nullable();
            $table->unsignedBigInteger('branch_division_id');
            $table->foreign('branch_division_id')->references('id')->on('divisions');
            $table->unsignedBigInteger('branch_subdivision_id');
            $table->foreign('branch_subdivision_id')->references('id')->on('subdivisions');
            $table->enum('position', ['Dependiente', 'Administrativo']);
            $table->decimal('sales_productivity', 8, 2);
            $table->boolean('emotional_social_session')->default(false);
            $table->boolean('emotional_management_session')->default(false);
            $table->boolean('informed_consent')->default(false);
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
