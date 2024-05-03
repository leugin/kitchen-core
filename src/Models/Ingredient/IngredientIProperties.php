<?php

namespace Leugin\KitchenCore\Models\Ingredient;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Leugin\KitchenCore\Models\Traits\TimestampTrait;
use Leugin\KitchenCore\Models\Warehouse\Warehouse;

/**
 * @property-read int $id
 * @property-read string $name
 */
trait IngredientIProperties
{
    use TimestampTrait;

    protected function label(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name,
        );
    }
}