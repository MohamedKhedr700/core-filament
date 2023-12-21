<?php

namespace Raid\Core\Filament\Filament\Resources\Pages;

use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class AbstractCreatePage extends CreateRecord
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
}
