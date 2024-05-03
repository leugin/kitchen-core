<?php

namespace Leugin\KitchenCore\Data\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class FindOrder extends Data
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?int $recipeId = null,
        public readonly ?string $status= null,
        public readonly ?string $label= null,
        public readonly ?string $createdRange= null,
        public readonly ?string $orderBy = null,
        public readonly ?string $orderDirection = null
    ) {
    }
}
