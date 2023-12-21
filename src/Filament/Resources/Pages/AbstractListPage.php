<?php

namespace Raid\Core\Filament\Filament\Resources\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class AbstractListPage extends ListRecords
{
    /**
     * The resource that this page corresponds to.
     */
    protected static string $resource = '';

    /**
     * Get the header actions for the page.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
