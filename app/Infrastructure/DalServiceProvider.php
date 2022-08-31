<?php

namespace App\Infrastructure;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Repositories\Interfaces\ICategoryRepository;
use App\Infrastructure\Repositories\CategoryRepository;

class DalServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $toBind = [
            ICategoryRepository::class => CategoryRepository::class,
        ];

        foreach ($toBind as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
