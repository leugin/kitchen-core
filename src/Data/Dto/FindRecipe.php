<?php

namespace Leugin\KitchenCore\Data\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class FindRecipe extends Data
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $name = null,
        public readonly ?int $description = null,
        public readonly ?int $search = null,
        public readonly ?array $ingredientIds = null,
        public readonly ?string $orderBy = null,
        public readonly ?string $orderDirection = null
    ) {
    }
}
