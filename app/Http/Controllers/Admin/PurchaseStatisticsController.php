<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;

class PurchaseStatisticsController extends Controller
{
    public function index() {
        // ottengo l id del ristorante associato all'utente loggato
         $restaurantId = auth()->user()->restaurant->id;

        // recupero i dati degli ordini raggruppati per mese e anno
        $statistics = Purchase::selectRaw('YEAR(date) as year, MONTH(date) as month, COUNT(*) as orders_count, SUM(total) as total_sales')
            ->where('restaurant_id', $restaurantId)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
            return view('admin.purchases.statistics', compact('statistics'));
    }
}