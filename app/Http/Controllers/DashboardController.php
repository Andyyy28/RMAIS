<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        return redirect()->route(match ($request->user()?->role?->slug) {
            'farmer' => 'farmer.dashboard',
            'rice_trader' => 'trader.dashboard',
            'consumer' => 'consumer.dashboard',
            'admin' => 'admin.dashboard',
            'super_admin' => 'super-admin.dashboard',
            default => 'prices',
        });
    }
}
