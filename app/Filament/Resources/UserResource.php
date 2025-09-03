<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Menu';
    protected static ?int $navigationSort = 1;

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
                                    ->maxLength(50),

                                TextInput::make('email')
                                    ->email()
                                    ->unique(ignoreRecord:true)
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('password')
                                    ->password()
                                    ->confirmed()
                                    ->required()
                                    ->visible(fn (string $context): bool => $context === 'create')
                                    ->maxLength(255),

                                TextInput::make('password_confirmation')
                                    ->password()
                                    ->required()
                                    ->visible(fn (string $context): bool => $context === 'create')
                                    ->maxLength(255),

                                TextInput::make('created_at')
                                    ->label('Created At')
                                    ->disabled()
                                    ->columnSpanFull(),

                                Toggle::make('is_admin')
                                    ->label('Admin')
                                    ->onIcon('heroicon-m-bolt')
                                    ->offIcon('heroicon-m-user')
                                    ->helperText('If checked, the user will have admin privileges.')
                                    ->columnSpanFull()


                            ])->columns(2),

                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('updated_at')
                    ->date(),

                IconColumn::make('is_admin')
                    ->boolean(),


            ])
            ->filters([
                TernaryFilter::make('is_admin')
                ->label('Type Of User')
                ->boolean()
                ->trueLabel('Admin')
                ->falseLabel('User')
                ->native(false)
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
