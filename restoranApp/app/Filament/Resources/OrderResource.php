<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Customer; // Ensure this is imported
use App\Models\Menu; // Ensure this is imported
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name') // Assuming you have a name field in the customers table
                    ->required(),
                Forms\Components\Select::make('menu_id')
                    ->relationship('menu', 'name') // Assuming you have a name field in the menus table
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'sedang disiapkan' => 'Sedang Disiapkan',
                        'siap diantar' => 'Siap Diantar',
                        'sudah selesai' => 'Sudah Selesai',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('order_date')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name') // Updated reference
                    ->label('Customer')
                    ->sortable(),
                TextColumn::make('menu.name') // Updated reference
                    ->label('Menu')
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->date()
                    ->sortable(),
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

    public function create()
{
    $menus = Menu::all(); // Fetch all menus
    dd($menus); // Check if this returns the expected menu data
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
