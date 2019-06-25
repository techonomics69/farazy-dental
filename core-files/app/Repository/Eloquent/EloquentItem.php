<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/14/2018
 * Time: 5:37 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\Item;
use App\Repository\ItemRepository;

class EloquentItem extends EloquentBase implements ItemRepository
{
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

}