<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;
use Leugin\KitchenCore\Models\Recipe\Recipe;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'ingredient_recipe', function (Blueprint $table) {
                $table->integer('quantity')->default(1);
                $table->foreignIdFor(Ingredient::class);
                $table->foreignIdFor(Recipe::class);
                $table->primary(['ingredient_id', 'recipe_id']);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_recipe');
    }
};
