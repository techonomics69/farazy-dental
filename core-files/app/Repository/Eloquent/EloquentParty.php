<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/10/2018
 * Time: 5:39 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Party\Party;
use App\Repository\PartyRepository;

class EloquentParty extends EloquentBase implements PartyRepository
{
    public function __construct(Party $party)
    {
        $this->model = $party;
    }

}