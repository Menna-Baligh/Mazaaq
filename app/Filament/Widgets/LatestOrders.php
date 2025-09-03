<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()->latest()->take(3)
            )
            ->columns([
                TextColumn::make('id')->label('Order ID'),
                TextColumn::make('user.name')->label('Customer'),
                TextColumn::make('total')->prefix('$'),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processing',
                        'primary' => 'shipped',
                        'success' => 'delivered',
                        'danger' => 'cancelled',
                    ]),
                TextColumn::make('created_at')->date(),
            ]);
    }
}
