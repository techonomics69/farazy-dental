<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/12/2018
 * Time: 1:34 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Item\Receive;
use App\Repository\ReceiveRepository;

class EloquentReceive extends EloquentBase implements ReceiveRepository
{

    public function __construct(Receive $receive)
    {
        $this->model = $receive;
    }

}