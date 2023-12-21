<?php

namespace Raid\Core\Filament\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AbstractResource extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    protected static ?string $model = '';

    /**
     * The icon of the resource.
     */
    protected static ?string $navigationIcon = '';

    /**
     * The group of the resource.
     */
    protected static ?string $navigationGroup = '';

    /**
     * The sort order of the resource in the navigation.
     */
    protected static ?int $navigationSort = 1;

    /**
     * Get form fields.
     */
    public static function form(Form $form): Form
    {
        return $form;
    }

    /**
     * Get table columns.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Get relations.
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * Get pages.
     */
    public static function getPages(): array
    {
        return [];
    }

    /**
     * Get globally searchable attributes.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    /**
     * Get the title of the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
