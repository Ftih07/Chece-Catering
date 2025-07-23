<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuSubcategoryResource\Pages;
use App\Filament\Resources\MenuSubcategoryResource\RelationManagers;
use App\Models\MenuSubcategory;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuSubcategoryResource extends Resource
{
    protected static ?string $model = MenuSubcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('menu_category_id')
                ->relationship('category', 'name')
                ->required(),

            Select::make('menu_addon_id') // ubah dari menu_addons_id
                ->relationship('addon', 'title')
                ->nullable(),

            TextInput::make('name')->required(),

            FileUpload::make('pdf_path')
                ->label('PDF File')
                ->directory('menu-pdfs') // folder di storage/app/public/menu-pdfs
                ->acceptedFileTypes(['application/pdf'])
                ->preserveFilenames()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('addon.title')->label('Addon')->toggleable(),
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
            'index' => Pages\ListMenuSubcategories::route('/'),
            'create' => Pages\CreateMenuSubcategory::route('/create'),
            'edit' => Pages\EditMenuSubcategory::route('/{record}/edit'),
        ];
    }
}
