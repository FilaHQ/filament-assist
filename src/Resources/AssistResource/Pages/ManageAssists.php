<?php

namespace FilaHQ\FilamentAssist\Resources\AssistResource\Pages;

use FilaHQ\FilamentAssist\Resources\AssistResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAssists extends ManageRecords
{
    protected static string $resource = AssistResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
