<h1 align="center">Filament Assist</h1>

<p align="center">Filament Assit to create Action with modal form for support / feedback / bug report.</p>


## Installation

You can install the package via composer:

```bash
composer require filahq/filament-assist
```

You can run the install command:

```bash
php artisan filament-assist:install
```

## Setup

### 1. Register the Plugin

Add the following code to your panel provider to register the plugin and enable access to all assist resources in your Filament panel:

```php
use FilaHQ\FilamentAssist\FilamentAssistPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugins([
                FilamentAssistPlugin::make()
            ]);
    }
}
```

### 2. Choose How to Display

You have two ways to add the assist form:

#### Option 1: As a Page Action
```php
use FilaHQ\FilamentAssist\Actions\AssistAction;

class YourPage extends Page
{
    protected function getHeaderActions(): array
    {
        return [
            AssistAction::make()
        ];
    }
}
```

#### Option 2: As a Livewire Component
```php
// In your blade file
<livewire:assist label="Get Help" type="support">
```

### 3. Customize (Optional)

Set a default assist type:
```php
FilamentAssistPlugin::make()
    ->defaultAssistType("support")
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [FilaHQ](https://github.com/FilaHQ)
- [Knight Tan](https://github.com/imknight)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
