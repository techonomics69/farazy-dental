<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 4:36 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\ItemUnit;
use App\Repository\UnitRepository;

class EloquentUnit extends EloquentBase implements UnitRepository
{

    public function __construct(ItemUnit $unit)
    {
        $this->model = $unit;
    }

}