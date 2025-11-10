<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
//use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Globales Teilen von Daten mit jeder Inertia‑Response
        Inertia::share([
            'auth' => [
                'user' => fn () => Auth::user(),
            ],
            /*
            'cart' => fn () => Cart::with('items.product')
                ->where('user_id', Auth::id() ?? 0)
                ->first(),
                */
            'cart' => [],
            // Laravel‑Ziggy (Routen‑Helper) bereits via Ziggy-Vue‑Plugin
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }    
}
