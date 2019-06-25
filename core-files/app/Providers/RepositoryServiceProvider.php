<?php

namespace App\Providers;

use App\Repository\Eloquent\EloquentGenericName;
use App\Repository\Eloquent\EloquentGroup;
use App\Repository\Eloquent\EloquentItem;
use App\Repository\Eloquent\EloquentItemThClass;
use App\Repository\Eloquent\EloquentItemType;
use App\Repository\Eloquent\EloquentLocation;
use App\Repository\Eloquent\EloquentManufacturer;
use App\Repository\Eloquent\EloquentOrganization;
use App\Repository\Eloquent\EloquentParty;
use App\Repository\Eloquent\EloquentUnit;
use App\Repository\GenericNameRepository;
use App\Repository\GroupRepository;
use App\Repository\ItemRepository;
use App\Repository\ItemTypeRepository;
use App\Repository\LocationRepository;
use App\Repository\ManufacturerRepository;
use App\Repository\OrganizationRepository;
use App\Repository\PartyRepository;
use App\Repository\ThClassRepository;
use App\Repository\UnitRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemTypeRepository::class, EloquentItemType::class);
        $this->app->bind(GenericNameRepository::class, EloquentGenericName::class);
        $this->app->bind(GroupRepository::class, EloquentGroup::class);
        $this->app->bind(PartyRepository::class, EloquentParty::class);
        $this->app->bind(ThClassRepository::class, EloquentItemThClass::class);
        $this->app->bind(ItemRepository::class, EloquentItem::class);
    }
}
