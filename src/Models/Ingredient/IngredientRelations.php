<?php

namespace Leugin\KitchenCore\Models\Ingredient;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Leugin\KitchenCore\Models\Traits\TimestampTrait;
use Leugin\KitchenCore\Models\Warehouse\Warehouse;

/**
 * @property-read int $id
 * @property-read string $name
 */
trait IngredientRelations
{
    use TimestampTrait;


    /**
     * @return HasOne
     */
    public function warehouse(): HasOne
    {
        return $this->hasOne(Warehouse::class);
    }

}