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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('platform_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('buy_date');
            $table->decimal('buy_price', 15, 2);
            $table->decimal('quantity', 18, 8);

            $table->date('sell_date')->nullable();
            $table->decimal('sell_price', 15, 2)->nullable();

            $table->enum('status', ['hold', 'sold'])->default('hold');

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
