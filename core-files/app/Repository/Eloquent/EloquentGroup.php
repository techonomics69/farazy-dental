<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 4:52 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\ItemGroup;
use App\Repository\GroupRepository;

class EloquentGroup extends EloquentBase implements GroupRepository
{

    public function __construct(ItemGroup $group)
    {
        $this->model = $group;
    }

}