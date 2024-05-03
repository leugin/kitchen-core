<?php

namespace Leugin\KitchenCore\Models\Warehouse;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Leugin\KitchenCore\Data\Dto\FindWarehouse;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

/**
 * @property Ingredient $ingredient
 * @method   static Builder filter(FindWarehouse $find)
 * @method   Builder search(string $search)
 * */
trait WarehouseRelationsAndScope
{


    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function scopeSearch(Builder $query, string $search):Builder
    {
        return $query->whereHas(
            'ingredient', function (Builder $query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            }
        );
    }

    public function scopeFilter(Builder $query, FindWarehouse $find):Builder
    {
        return $query
            ->when(
                !is_null($find->ingredientId), function (Builder $query) use ($find) {
                    return  $query->where('ingredient_id', $find->ingredientId);
                }
            )
            ->when(
                !is_null($find->label), function (Builder|self $query) use ($find) {
                    return  $query->search($find->label);
                }
            )
            ->when(
                !is_null($find->orderBy), function (Builder $query) use ($find) {
                    return  $query->orderBy($find->orderBy, $find->orderDirection ?? 'desc');
                }
            );
    }
}