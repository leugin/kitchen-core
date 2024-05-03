<?php

namespace Leugin\KitchenCore\Data\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class FindWarehouse extends Data
{
    public function __construct(
        public readonly ?int $ingredientId = null,
        public readonly ?int $stock = null,
        public readonly ?string $label = null,
        public readonly ?string $orderBy = null,
        public readonly ?string $orderDirection = null
    ) {
    }
}
