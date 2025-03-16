<?php

namespace FilaHQ\FilamentAssist\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components;
use Filament\Support\Enums\MaxWidth;
use FilaHQ\FilamentAssist\Models\Assist;

class AssistAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'assist';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->form($this->modalForm());
        $this->modalWidth(MaxWidth::Large);
        $this->action($this->assist(...));
    }

    protected function modalForm(): array
    {
        return [
            Components\TextInput::make('title')->required(),
            Components\Textarea::make('content')->required(),
        ];
    }

    protected function assist(array $data, $livewire): void
    {
        $data['user_id'] = auth()->user()->id;
        $data['type'] = filament('filament-assist')->type();
        $data['source'] = $livewire->getName();
        Assist::create($data);
    }
}
