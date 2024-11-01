<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\DecimalColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('category')
                    ->options([
                        'makanan utama' => 'Makanan Utama',
                        'minuman' => 'Minuman',
                        'makanan penutup' => 'Makanan Penutup',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxLength(10),
                Forms\Components\Toggle::make('availability')
                    ->default(true)
                    ->label('Available'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // return $table->columns([
        //     TextColumn::make('name')->label('Name'),
        //     TextColumn::make('category')->label('Category'),
        //     DecimalColumn::make('price')
        //         ->label('Price')
        //         ->currency('IDR') // Adds currency symbol if needed
        //         ->decimalPlaces(2), // Ensures 2 decimal places
        //     BooleanColumn::make('availability')->label('Availability'),
        //     TextColumn::make('created_at')->label('Created At')->dateTime(),
        //     TextColumn::make('updated_at')->label('Updated At')->dateTime(),
        // ])
        return $table->columns([
            TextColumn::make('name')->label('Name'),
            TextColumn::make('category')->label('Category'),
            TextColumn::make('price')
                ->label('Price')
                ->money('IDR', true) // Formats price with currency symbol
                ->sortable(),
            BooleanColumn::make('availability')->label('Availability'),
            TextColumn::make('created_at')->label('Created At')->dateTime(),
            TextColumn::make('updated_at')->label('Updated At')->dateTime(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
