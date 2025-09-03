<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReservationsChart extends ChartWidget
{
    protected static ?string $heading = 'Reservations per Week';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $reservations = Reservation::select(DB::raw('WEEK(created_at) as week, COUNT(*) as count'))
            ->groupBy('week')
            ->orderBy('week')
            ->pluck('count', 'week')
            ->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Reservations',
                    'data' => array_values($reservations),
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'],
                ],
            ],
            'labels' => array_map(fn($w) => 'Week '.$w, array_keys($reservations)),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
