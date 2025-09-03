<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Reservation;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestReservations extends BaseWidget
{
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Reservation::query()->latest()->take(3)
            )
            ->columns([
                TextColumn::make('id')->label('Booking ID'),
                TextColumn::make('user.name')->label('Customer'),
                TextColumn::make('reservation_date')->date(),
                TextColumn::make('people_count')->label('People'),
                BadgeColumn::make('status')
                    ->colors([
                    'warning' => 'processing',
                    'success' => 'booked',
                    'danger' => 'cancelled',
                ]),
            ]);
    }
}
