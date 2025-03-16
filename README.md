<h1 align="center">Filament Assist</h1>

<p align="center">Filament Assit to create Action with modal form for support / feedback / bug report.</p>


## Installation

You can install the package via composer:

```bash
composer require filahq/filament-assist
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-assist-migrations"
php artisan migrate
```

## Usage

### Register Plugin for Assist Resource

```php
<?php
 
namespace App\Providers\Filament;
 
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Actions\Action;
use FilaHQ\FilamentAssist\FilamentAssistPlugin;
 
class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ...
            ->plugins([
               FilamentAssistPlugin::make()
            ])
    }
}

```

### defaultAssistType for the default type of each assist

```php

    FilamentAssistPlugin::make()->defaultAssistType("support")

```

### Add to Page Actions

```php
<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use FilaHQ\FilamentAssist\Actions\AssistAction;

class Beta extends Page
{
    protected function getHeaderActions(): array
    {
        return [AssistAction::make()];
    }
}

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [FilaHQ](https://github.com/FilaHQ)
- [Knight Tan](https://github.com/imknight)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
