<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        \App\Repositories\SeriesRepository::class => \App\Repositories\EloquentSeriesRepository::class
    ];
    

}
