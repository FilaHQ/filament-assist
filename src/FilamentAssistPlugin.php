<?php

namespace FilaHQ\FilamentAssist;

use Filament\Contracts\Plugin;
use Filament\Panel;
use FilaHQ\FilamentAssist\Resources\AssistResource;

class FilamentAssistPlugin implements Plugin
{
    protected string $type = 'assist';

    public function getId(): string
    {
        return 'filament-assist';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([AssistResource::class]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
    public function defaultAssistType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function type(): string
    {
        return $this->type;
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
