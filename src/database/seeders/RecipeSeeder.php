<?php

namespace Leugin\KitchenCore\database\seeders;

use Illuminate\Database\Seeder;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;
use Leugin\KitchenCore\Models\Recipe\Recipe;

class RecipeSeeder extends Seeder
{
    const DATA = [
        [
            'name' => 'Citrus Chicken Salad',
            'image_url'=>'https://images.themodernproper.com/billowy-turkey/production/posts/2023/CitrusChickenSalad_7.jpg',
            'ingredients'=>[
                Ingredient::CHICKEN,
                Ingredient::LETTUCE,
                Ingredient::TOMATO,
                Ingredient::LEMON,
                Ingredient::ONION,
                Ingredient::CHEESE
            ]
        ],
        [
            'name'=>'Cheesy Vegetable Rice',
            'image_url'=>'https://thesaltymarshmallow.com/wp-content/uploads/2019/01/rice-vegetables4.jpg',
            'ingredients'=>[
                Ingredient::RICE,
                Ingredient::TOMATO,
                Ingredient::ONION,
                Ingredient::RICE,
                Ingredient::CHEESE,
                Ingredient::LEMON
            ]
        ],
        [
            'name'=>'Stuffed Potatoes with Meat',
            'image_url'=>'https://thelemonapron.com/wp-content/uploads/2023/10/shepherds-Pie-Stuffed-Potatoes-3.jpg',
            'ingredients'=> [
                Ingredient::POTATO,
                Ingredient::MEAT,
                Ingredient::ONION,
                Ingredient::TOMATO,
                Ingredient::CHEESE
            ]
        ],
        [
            'name'=>'Chicken Rolls with Tomato Sauce',
            'image_url'=>'https://cafedelites.com/wp-content/uploads/2016/04/Quick-Chicken-Parmigiana-1-1.jpg',
            'ingredients'=>[
                Ingredient::CHICKEN,
                Ingredient::TOMATO,
                Ingredient::CHEESE,
                Ingredient::ONION,
                Ingredient::KETCHUP,

            ]
        ],
        [
            'name'=>'Rice and Chicken Salad with Lemon Dressing',
            'image_url'=>'https://themom100.com/wp-content/uploads/2021/05/chicken-and-rice-salad-565-1200x800.jpg',
            'ingredients'=>[
                Ingredient::RICE,
                Ingredient::CHICKEN,
                Ingredient::LETTUCE,
                Ingredient::TOMATO,
                Ingredient::LEMON,
                Ingredient::CHEESE,
            ]
        ],
        [
            'name'=>'Cheese and Ketchup Burgers',
            'image_url'=>'https://www.recipetineats.com/wp-content/uploads/2022/08/Stack-of-cheeseburgers.jpg',
            'ingredients'=>[
                Ingredient::MEAT,
                Ingredient::CHEESE,
                Ingredient::TOMATO,
                Ingredient::LETTUCE,
                Ingredient::ONION,
                Ingredient::KETCHUP,
            ]
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::DATA as $item) {
            $recipe = Recipe::query()->firstOrCreate(
                ['name'=>$item['name']], [
                'name'=>$item['name'],
                'image_url'=>$item['image_url'],
                ]
            );
            $recipe->ingredients()->sync($item['ingredients']);
        }
    }
}
