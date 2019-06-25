<?php
/**
 * Created by PhpStorm.
 * User: IT06
 * Date: 2/13/2018
 * Time: 5:54 PM
 */

namespace App\Repository\Eloquent;


use App\Model\Organization;
use App\Repository\OrganizationRepository;

class EloquentOrganization extends EloquentBase implements OrganizationRepository
{

    public function __construct(Organization $organization)
    {
        $this->model = $organization;
    }

}