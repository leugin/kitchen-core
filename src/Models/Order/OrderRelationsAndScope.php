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
 * @property-read Recipe $recipe
 * @method        static Builder filter(FindOrder $find)
 * @method        Builder search(string $search)
 */
trait OrderRelationsAndScope
{
    use TimestampTrait;

    /**
     * @return BelongsToMany
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function scopeSearch(Builder $query, string $search):Builder
    {
        return $query->whereHas(
            'recipe', function (Builder $query) use ($search) {
                return $query->where('name', 'like', '%'.$search.'%');
            }
        );
    }

    public function scopeFilter(Builder $query, FindOrder $find):Builder
    {
        return  $query->when(
            !is_null($find->id), function (Builder $query) use ($find) {
                return $query->where('id', $find->id);
            }
        )
            ->when(
                !is_null($find->status), function (Builder $query) use ($find) {
                    return $query->where('status', $find->status);
                }
            )
            ->when(
                !is_null($find->recipeId), function (Builder $query) use ($find) {
                    return $query->where('recipe_id', $find->recipeId);
                }
            )
            ->when(
                !is_null($find->createdRange), function (Builder $query) use ($find) {
                    $split = explode(':', $find->createdRange);
                    $start = Carbon::parse($split[0]);
                    $end = Carbon::parse($split[1]);
                    return $query->whereBetween('created_at', [$start, $end]);
                }
            )
            ->when(
                !is_null($find->label), function (Builder|Order $query) use ($find) {
                    return $query->search($find->label);
                }
            )
            ->when(
                !is_null($find->orderBy), function (Builder $query) use ($find) {
                    return $query->orderBy($find->orderBy, $find->orderDirection ?? 'asc');
                }
            );
    }
}