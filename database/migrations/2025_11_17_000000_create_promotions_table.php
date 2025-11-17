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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image_path')->nullable();
            
            // Descuento: puede ser porcentaje o cantidad fija
            $table->decimal('discount_percentage', 5, 2)->nullable()->comment('Porcentaje de descuento (ej: 30.00 para 30%)');
            $table->decimal('discount_amount', 8, 2)->nullable()->comment('Descuento en cantidad fija');
            $table->decimal('price', 8, 2)->nullable()->comment('Precio especial (alternativa a descuento)');
            
            // Validez de la promoción
            $table->dateTime('validity_start')->nullable();
            $table->dateTime('validity_end')->nullable();
            $table->string('validity_description')->nullable()->comment('Ej: "Lunes a domingo", "Válido todo el año"');
            
            // Tipo de promoción
            $table->enum('promotion_type', ['percentage', 'fixed_amount', 'special_price'])->default('percentage')->comment('Tipo de descuento');
            
            // Estado
            $table->boolean('is_active')->default(true)->comment('Si la promoción está activa');
            
            // Posición en el slider
            $table->integer('position')->default(0)->comment('Orden de aparición en el slider');
            
            // Timestamps
            $table->timestamps();
            
            // Índices
            $table->index('is_active');
            $table->index('validity_start');
            $table->index('validity_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
