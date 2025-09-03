<?php

namespace App\Filament\Widgets;

use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getTrendStat($model, string $label, string $icon, string $defaultColor = 'info'): Stat
    {
        $total = $model::count();
        $current = $model::whereMonth('created_at', now()->month)->count();
        $previous = $model::whereMonth('created_at', now()->subMonth()->month)->count();
        $diff = $current - $previous;

        $percentage = $previous > 0 ? ($diff / $previous) * 100 : ($current > 0 ? 100 : 0);

        if ($diff > 0) {
            $description = '+' . round($percentage, 1) . '%';
        } elseif ($diff < 0) {
            $description = '-' . abs(round($percentage, 1)) . '%';
        } else {
            $description = 'No Change';
        }

        return Stat::make($label, $total)
            ->description($description)
            ->descriptionIcon($diff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($diff >= 0 ? 'success' : 'danger')
            ->chart([$previous, $current])
            ->icon($icon);
    }
    protected function getStats(): array
    {

        return [
                $this->getTrendStat(User::class, 'Users', 'heroicon-o-users'),
                $this->getTrendStat(Food::class, 'Foods', 'heroicon-o-shopping-cart', 'warning'),
                $this->getTrendStat(Reservation::class, 'Reservations', 'heroicon-o-tag', 'success'),
                $this->getTrendStat(Order::class, 'Orders', 'heroicon-o-shopping-bag', 'info'),
        ];
    }
}
