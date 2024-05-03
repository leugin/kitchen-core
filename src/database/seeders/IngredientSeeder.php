<?php

namespace Leugin\KitchenCore\database\seeders;

use Illuminate\Database\Seeder;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

class IngredientSeeder extends Seeder
{
    const DATA = [
        [
            'id' => Ingredient::TOMATO,
            'name' => 'Tomato',
        ],
        [
            'id' => Ingredient::LEMON,
            'name' => 'Lemon',
        ],
        [
            'id' => Ingredient::POTATO,
            'name' => 'Potato',
        ],
        [
            'id' => Ingredient::RICE,
            'name' => 'Rice',
        ],
        [
            'id' => Ingredient::KETCHUP,
            'name' => 'Ketchup',
        ],
        [
            'id' => Ingredient::LETTUCE,
            'name' => 'Lettuce',
        ],
        [
            'id' => Ingredient::ONION,
            'name' => 'Onion',
        ],
        [
            'id' => Ingredient::CHEESE,
            'name' => 'Cheese',
        ],
        [
            'id' => Ingredient::MEAT,
            'name' => 'Meat',
        ],
        [
            'id' => Ingredient::CHICKEN,
            'name' => 'Chicken',
        ],

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DATA as $item) {
            Ingredient::query()->firstOrCreate(['id' => $item['id']], $item);
        }
    }
}
