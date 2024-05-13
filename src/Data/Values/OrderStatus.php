<?php
namespace Leugin\KitchenCore\Data\Values;

enum OrderStatus:string
{
    case OPEN = 'pending';
    case FINISHED = 'finished';
}
