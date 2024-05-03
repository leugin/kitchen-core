<?php
namespace Leugin\KitchenCore;


use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class LaravelKitchenServicePackageProvider  extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerDatabase();
        $this->registerSeeders();
    }

    /**
     * @return void
     */
    public function registerDatabase(): void
    {
        $migrationPath = __DIR__ . '/database/migrations/';
        $this->publishes(
            [
            $migrationPath => App::databasePath('migrations'),
            ], 'kitchen-migrations'
        );
        $this->loadMigrationsFrom($migrationPath);

    }
    /**
     * @return void
     */
    public function registerSeeders(): void
    {
        $path = __DIR__ . '/database/seeders/';
        $this->publishes(
            [
            $path => App::databasePath('seeders'),
            ], 'kitchen-seeders'
        );


    }
}