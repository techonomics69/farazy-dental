<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/13/2018
 * Time: 6:46 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\ItemThClass;
use App\Repository\ThClassRepository;

class EloquentItemThClass extends EloquentBase implements ThClassRepository
{

    public function __construct(ItemThClass $itemThClass)
    {
        $this->model = $itemThClass;
    }

}