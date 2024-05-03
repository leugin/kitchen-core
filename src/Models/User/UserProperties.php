<?php

namespace Leugin\KitchenCore\Models\User;


use Leugin\KitchenCore\Models\Traits\TimestampTrait;

/**
 * @property-read int $id
 * @property      string $name
 * @property      string $email
 * @property      string $password
 */
trait UserProperties
{
    use TimestampTrait;


}