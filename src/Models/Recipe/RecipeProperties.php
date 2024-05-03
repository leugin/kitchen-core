<?php

namespace Leugin\KitchenCore\Models\Recipe;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Leugin\KitchenCore\Data\Dto\FindRecipe;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

/**
 * @property-read int $id
 * @property      string $image_url
 * @property      string $label
 * @property      string $description
 * @property      string $name
 */
trait RecipeProperties
{


    public function label():Attribute
    {
        return Attribute::make(
            get: fn() => $this->name,
        );
    }

}