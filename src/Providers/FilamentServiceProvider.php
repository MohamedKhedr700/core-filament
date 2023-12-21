<?php

namespace Raid\Core\Filament\Providers;

use Illuminate\Support\ServiceProvider;
use Raid\Core\Filament\Commands\PublishFilamentCommand;
use Raid\Core\Filament\Traits\Provider\WithFilamentProvider;

class FilamentServiceProvider extends ServiceProvider
{
    use WithFilamentProvider;

    /**
     * The commands to be registered.
     */
    protected array $commands = [
        PublishFilamentCommand::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->registerConfig();
//        $this->registerHelpers();
        $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
