<?php

namespace App\Providers;

use App\Services\ClassificationService;
use App\Services\impl\ClassificationServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClassificationServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function provides() : array {
        return [ClassificationService::class];
    }

    public array $singletons = [
        ClassificationService::class => ClassificationServiceImpl::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
