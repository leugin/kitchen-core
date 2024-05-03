<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;
use Leugin\KitchenCore\Models\Order\Order;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'ingredient_order', function (Blueprint $table) {
                $table->foreignIdFor(Order::class);
                $table->foreignIdFor(Ingredient::class);
                $table->integer('required')->default(1);
                $table->integer('available')->default(0);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_order');
    }
};
