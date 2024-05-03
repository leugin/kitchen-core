<?php

namespace Leugin\KitchenCore\Models\Ingredient;

use Illuminate\Database\Eloquent\Model;

/**
 */
class Ingredient extends Model
{
    use IngredientRelations, IngredientIProperties;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];


    /**
     *
     */
    const TOMATO = 1;
    /**
     *
     */
    const LEMON = 2;
    /**
     *
     */
    const POTATO = 3;
    /**
     *
     */
    const RICE =  4;
    /**
     *
     */
    const KETCHUP =  5;
    /**
     *
     */
    const LETTUCE =  6;
    /**
     *
     */
    const ONION =  7;
    /**
     *
     */
    const CHEESE =  8;
    /**
     *
     */
    const MEAT =  9;
    /**
     *
     */
    const CHICKEN =  10;


}
