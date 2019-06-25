<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/12/2018
 * Time: 1:37 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Manufacturer;
use App\Repository\ManufacturerRepository;

class EloquentManufacturer extends EloquentBase implements ManufacturerRepository
{
    public function __construct(Manufacturer $manufacturer)
    {
        $this->model = $manufacturer;
    }

}