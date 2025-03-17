<?php

namespace FilaHQ\FilamentAssist\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components;
use Filament\Support\Enums\MaxWidth;
use FilaHQ\FilamentAssist\Models\Assist;

class AssistAction extends Action
{
    public $type = 'assist';

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

    public function defaultAssistType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    protected function assist(array $data, $livewire): void
    {
        $type = filament()->hasPlugin('filament-assist')
            ? filament('filament-assist')->type()
            : $this->type;
        $data['user_id'] = auth()->user()->id;
        $data['type'] = $type;
        $data['source'] = $livewire->getName();
        Assist::create($data);
    }
}
