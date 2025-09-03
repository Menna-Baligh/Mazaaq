<?php

namespace App\Filament\Widgets;

use App\Models\OrderDetail;
use Filament\Widgets\ChartWidget;

class TopFoodChart extends ChartWidget
{
    protected static ?string $heading = 'Top 5 Foods';
        protected static ?int $sort = 6;


    protected function getData(): array
    {
        $foods = OrderDetail::selectRaw('food_id, SUM(quantity) as total')
            ->groupBy('food_id')
            ->orderByDesc('total')
            ->with('food')
            ->take(5)
            ->get();

        $colors = [
            '#FF6384',
            '#36A2EB',
            '#FFCE56',
            '#4BC0C0',
            '#9966FF',
        ];
        return [
            'datasets' => [
                [
                    'label' => 'Foods',
                    'data' => $foods->pluck('total'),
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $foods->pluck('food.name'),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
