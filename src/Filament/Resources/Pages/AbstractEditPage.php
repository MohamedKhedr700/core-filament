<?php

namespace Raid\Core\Filament\Filament\Resources\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class AbstractEditPage extends EditRecord
{
    /**
     * The resource class this page corresponds to.
     */
    protected static string $resource = '';

    /**
     * Get the page form.
     */
    public function form(Form $form): Form
    {
        return $form;
    }

    /**
     * Get the header actions for the page.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
