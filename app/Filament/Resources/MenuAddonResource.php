<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuAddonResource\Pages;
use App\Filament\Resources\MenuAddonResource\RelationManagers;
use App\Models\MenuAddon;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuAddonResource extends Resource
{
    protected static ?string $model = MenuAddon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')->required(),
                RichEditor::make('description')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')->searchable(),
                TextColumn::make('description')->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuAddons::route('/'),
            'create' => Pages\CreateMenuAddon::route('/create'),
            'edit' => Pages\EditMenuAddon::route('/{record}/edit'),
        ];
    }
}
