<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 4:02 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\ItemGeneric;
use App\Repository\GenericNameRepository;

class EloquentGenericName extends EloquentBase implements GenericNameRepository
{

    public function __construct(ItemGeneric $genericName)
    {
        $this->model = $genericName;
    }

}