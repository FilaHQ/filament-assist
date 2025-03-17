<?php

namespace FilaHQ\FilamentAssist\Livewire;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use FilaHQ\FilamentAssist\Actions\AssistAction;

class AssistComponent extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public string $label = 'Assist';
    public string $type = 'assist';

    public function componentAction(): Action
    {
        return AssistAction::make('component')
            ->label($this->label)
            ->defaultAssistType($this->type);
    }

    public function render(): View
    {
        return view('filament-assist::component');
    }
}
