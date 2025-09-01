<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Food;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\FoodResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FoodResource\RelationManagers;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                Select::make('category')
                                    ->options([
                                        'breakfast' => 'Breakfast',
                                        'lunch' => 'Lunch',
                                        'dinner' => 'Dinner',
                                    ])
                                    ->required(),
                                MarkdownEditor::make('description')->columnSpan('full'),
                            ])->columns(2),
                    ]),

                    Group::make()
                    ->schema([
                        section::make('image')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('foods')
                                    ->imageEditor()
                                    ->columnSpan('full')
                                    ,
                            ]),

                        section::make('price & stock')
                            ->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0),

                                TextInput::make('stock_quantity')
                                    ->required()
                                    ->integer()
                                    ->minValue(0),
                            ])->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                            ->label('Food Name')
                            ->searchable()
                            ->sortable(),

                ImageColumn::make('image')
                            ->label('Food Image')
                            ->disk('public')
                            ->visibility('public')
                            ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                            ->rounded(),


                TextColumn::make('price')
                            ->label('Price')
                            ->prefix('$'),

                TextColumn::make('stock_quantity')
                            ->label('Stock Quantity'),

                BadgeColumn::make('category')
                ->label('Category')
                ->colors([
                    'info' => 'breakfast',
                    'warning' => 'lunch',
                    'success' => 'dinner',
                ])
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'breakfast' => 'Breakfast',
                        'lunch' => 'Lunch',
                        'dinner' => 'Dinner',
                    ]),
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
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }
}
