<?php

namespace Leugin\KitchenCore\Models\Recipe;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Leugin\KitchenCore\Data\Dto\FindRecipe;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;


class Recipe extends Model
{
    use RecipeProperties, RecipeRelationsAndScope;

    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];
}
