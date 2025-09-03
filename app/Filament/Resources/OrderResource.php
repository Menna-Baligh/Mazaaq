<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Food;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Menu';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                // Step 1: Order Info
                Step::make('Order Info')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required(),



                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending'),

                        Section::make('Shipping Information')
                            ->schema([
                                TextInput::make('shipping_name')->required(),
                                TextInput::make('shipping_email')->email()->required(),
                                TextInput::make('shipping_phone')->required(),
                                TextInput::make('shipping_address')->required(),
                                TextInput::make('shipping_town')->required(),
                                TextInput::make('shipping_country'),
                                TextInput::make('shipping_zip'),
                            ])->columns(2),
                    ]),
                        // Step 2: Order Details
                        Step::make('Order Details')
                        ->schema([
                            Repeater::make('details')
                                ->relationship()
                                ->schema([
                                    Select::make('food_id')
                                        ->relationship('food', 'name')
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $food = Food::find($state);
                                            $set('price', $food->price);
                                        }),

                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->minValue(1)
                                        ->required(),


                                    TextInput::make('price')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated(true),
                                ])
                                ->columns(3)
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $total  = collect($state)->sum(fn($item) => $item['price'] * $item['quantity']);
                                    $set('total', $total);
                                }),

                                TextInput::make('total')
                                ->label('Total')
                                ->numeric()
                                ->disabled()
                                ->dehydrated(true)
                        ]),
            ])->columnSpanFull()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Customer')->sortable()->searchable(),
                TextColumn::make('total')->money('usd')->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processing',
                        'primary' => 'shipped',
                        'success' => 'delivered',
                        'danger' => 'cancelled',
                    ])
                    ->sortable(),
                TextColumn::make('shipping_name')->label('Recipient')->searchable(),
                TextColumn::make('created_at')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                ])
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
