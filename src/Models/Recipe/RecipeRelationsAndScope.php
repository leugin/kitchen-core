<?php

namespace Leugin\KitchenCore\Models\Recipe;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Leugin\KitchenCore\Data\Dto\FindRecipe;
use Leugin\KitchenCore\Models\Ingredient\Ingredient;

/**
 * @property Collection|Ingredient[]|null $ingredients
 * @method   static Builder filter(FindRecipe $find)
 * @method   Builder search(string $search)
 */
trait RecipeRelationsAndScope
{

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot(
                [
                'quantity'
                ]
            );
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where(
            function (Builder $q) use ($search) {
                return $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            }
        );
    }

    public function scopeFilter(Builder $query, FindRecipe $findRecipe)
    {
        return $query
            ->when(
                $findRecipe->name, function (Builder $query) use ($findRecipe) {
                    return $query->where('name', 'like', '%' . $findRecipe->name . '%');
                }
            )
            ->when(
                $findRecipe->id, function (Builder $query) use ($findRecipe) {
                    return $query->where('id', $findRecipe->id);
                }
            )
            ->when(
                $findRecipe->description, function (Builder $query) use ($findRecipe) {
                    return $query->where('description', 'like', '%' . $findRecipe->description . '%');
                }
            )
            ->when(
                $findRecipe->ingredientIds, function (Builder $query) use ($findRecipe) {
                    return $query->whereHas(
                        'ingredients', function (Builder $query) use ($findRecipe) {
                            return $query->whereIn('id', $findRecipe->ingredientIds);
                        }
                    );
                }
            )
            ->when(
                $findRecipe->orderBy, function (Builder $query) use ($findRecipe) {
                    return $query->orderBy($findRecipe->orderBy, $findRecipe->orderDirection ?? 'desc');
                }
            );

    }
}