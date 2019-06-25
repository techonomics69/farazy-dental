<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 4:01 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\ItemType;
use App\Repository\ItemTypeRepository;

class EloquentItemType extends EloquentBase implements ItemTypeRepository
{
    public function __construct(ItemType $itemType)
    {
        $this->model = $itemType;
    }

}