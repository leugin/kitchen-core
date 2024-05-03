<?php

namespace Leugin\KitchenCore\database\seeders;

use Illuminate\Database\Seeder;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients  = Ingredient::query()->get();
        /**
* @var Ingredient $ingredient
*/
        foreach ($ingredients as $ingredient) {
            $ingredient->warehouse()->updateOrCreate(
                [
                'stock' => 5,
                ], [
                'stock' => 5,
                ]
            );
        }
    }
}
