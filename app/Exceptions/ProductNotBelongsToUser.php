<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render (){

        return ['error'=>'This product not belong to user!'];

    }
}
