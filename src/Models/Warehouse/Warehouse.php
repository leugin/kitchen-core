<?php

namespace Leugin\KitchenCore\Models\Warehouse;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Leugin\KitchenCore\Data\Dto\FindWarehouse;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;



class Warehouse extends Model
{
    use WarehouseProperties, WarehouseRelationsAndScope;

    /**
     * @var string[]
     */
    protected $fillable = [
        'ingredient_id',
        'stock'
    ];
    protected $primaryKey = 'ingredient_id';
}
