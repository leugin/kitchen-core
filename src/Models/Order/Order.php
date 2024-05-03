<?php

namespace Leugin\KitchenCore\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use OrderProperties, OrderRelationsAndScope;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'recipe_id',
        'status'
    ];

    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime'
    ];

}
