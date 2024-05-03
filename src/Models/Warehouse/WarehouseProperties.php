<?php

namespace Leugin\KitchenCore\Models\Warehouse;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Leugin\KitchenCore\Data\Dto\FindWarehouse;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

/**
 * @property int $ingredient_id
 * @property int $stock
 * @property Carbon $updated_at
 * @property string $label
 * */
trait WarehouseProperties
{


    protected function label(): Attribute
    {
        $this->loadMissing('ingredient');
        return Attribute::make(
            get: fn () => $this->ingredient->name,
        );
    }

}