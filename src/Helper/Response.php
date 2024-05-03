<?php

namespace Leugin\KitchenCore\Helper;


use Illuminate\Support\Facades\App;

class Response
{
    public static function success(mixed $data = []):array
    {
        return [
            'success' => true,
            'data' => $data,
        ];
    }
    public static function failed(string $message,  array|null $errors =  null, $dev = [] ):array
    {
        $base =  [
            'success' => false,
            'message'=>$message,
            'errors' => $errors,
        ];
        if (App::hasDebugModeEnabled()) {
            $base['dev'] = $dev;
        }
        return $base;
    }
}