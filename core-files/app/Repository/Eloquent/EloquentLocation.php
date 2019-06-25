<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 6:27 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\Location;
use App\Repository\LocationRepository;

class EloquentLocation extends EloquentBase implements LocationRepository
{

    public function __construct(Location $location)
    {
        $this->model = $location;
    }

}