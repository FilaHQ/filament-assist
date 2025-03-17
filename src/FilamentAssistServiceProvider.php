<?php

namespace FilaHQ\FilamentAssist;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Livewire;
use FilaHQ\FilamentAssist\Livewire\AssistComponent;

class FilamentAssistServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-assist';

    public static string $viewNamespace = 'filament-assist';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('filahq/filament-assist');
            });

        $configFileName = $package->shortName();

        if (
            file_exists($package->basePath("/../config/{$configFileName}.php"))
        ) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        // if (file_exists($package->basePath('/../resources/lang'))) {
        //     $package->hasTranslations();
        // }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageBooted(): void
    {
        Livewire::component('assist', AssistComponent::class);
    }

    public function packageRegistered(): void {}

    protected function getAssetPackageName(): ?string
    {
        return 'filahq/filament-assist';
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return ['create_filament-assist_table'];
    }
}
