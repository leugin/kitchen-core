<?php

namespace Leugin\KitchenCore\Models\Order;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Leugin\KitchenCore\Data\Dto\FindOrder;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;
use Leugin\KitchenCore\Models\Recipe\Recipe;
use Leugin\KitchenCore\Models\Traits\TimestampTrait;


/**
 * @property-read int $id
 * @property-read int user_id
 * @property-read int recipe_id
 * @property-read string status
 * @property-read Carbon created_at
 * @property-read string label
 * @property-read Recipe $recipe
 */
trait OrderProperties
{
    use TimestampTrait;



    protected function label(): Attribute
    {
        $this->loadMissing('recipe');
        return Attribute::make(
            get: fn () => $this->recipe->name,
        );
    }


}