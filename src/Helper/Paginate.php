<?php

namespace Leugin\KitchenCore\Helper;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
    public static function meta(LengthAwarePaginator $resource)
    {
        return [
            'current_page' => $resource->currentPage(),
            'from' => $resource->perPage(),
            'last_page' => $resource->lastPage(),
            'per_page' => $resource->perPage(),
            'to' => $resource->lastPage(),
            'total' => $resource->total(),
        ];
    }
}