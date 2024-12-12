<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseStatisticsController extends Controller
{
    public function index() {
        // recupero i dati degli ordini raggruppati per mese e anno
        $statistics = Purchase::selectRaw('YEAR(date) as year, MONTH(date) as month, COUNT(*) as orders_count, SUM(total) as total_sales')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
            return view('admin.purchases.statistics', compact('statistics'));
    }
}