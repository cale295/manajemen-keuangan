<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Transaction;

class FinanceOverview extends Widget
{
    protected static string $view = 'filament.widgets.finance-overview';

    public function getViewData(): array
    {
        $income = Transaction::where('type', 'income')->sum('amount');
        $expense = Transaction::where('type', 'expense')->sum('amount');
        $balance = $income - $expense;

        return [
            'income' => $income,
            'expense' => $expense,
            'balance' => $balance,
        ];
    }
}
