<?php

namespace App\Http\Controllers;

use App\Http\Permissions\Attributes\RequireNoPermission;
use App\Services\LicenseService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    #[RequireNoPermission]
    public function home(Request $request)
    {
        $url = parse_url($request->url());
        $port = ($url['scheme'] == 'https') ? '8443' : '8080';
        $serviceToolUrl = sprintf('%s://%s:%s', $url['scheme'], $url['host'], $port);

        $validShopLicense = ! app(LicenseService::class)->checkHasModuleLicense('base');

        return Inertia::render('Content/Home', [
            
        ]);
    }

    #[RequireNoPermission]
    public function login(Request $request)
    {
        $url = parse_url($request->url());
        $port = ($url['scheme'] == 'https') ? '8443' : '8080';
        $serviceToolUrl = sprintf('%s://%s:%s', $url['scheme'], $url['host'], $port);

        $validShopLicense = ! app(LicenseService::class)->checkHasModuleLicense('base');

        return Inertia::render('Content/Login', [
            
        ]);
    }

    public function index(Request $request)
    {
        /*
        $products = Product::latest()
            ->take(9)
            ->get(['id', 'name', 'price', 'image'])
            ->toArray();
        */
        $products = [
            ['id'=>1,'name'=>'Produkt 1', 'price'=>1.22,'image'=>'kein-bild.jpg'],
            ['id'=>2,'name'=>'Produkt 2', 'price'=>1.22,'image'=>'kein-bild.jpg'],
            ['id'=>3,'name'=>'Produkt 3', 'price'=>1.22,'image'=>'kein-bild.jpg'],
            ['id'=>4,'name'=>'Produkt 4', 'price'=>1.22,'image'=>'kein-bild.jpg'],
            ['id'=>5,'name'=>'Produkt 5', 'price'=>1.22,'image'=>'kein-bild.jpg'],
            ['id'=>6,'name'=>'Produkt 6', 'price'=>1.22,'image'=>'kein-bild.jpg'],
        ];

        $promo = [
            'title' => 'Sonderaktion',
            'text' => '10 % Rabatt auf alle Produkte!',
            'image' => '/images/promo.jpg',
        ];

        $sharedData = [
            'shopName' => config('app.name'),
            'products' => $products,
            'promo' => $promo,
            'title' => 'Startseite – '.config('app.name'),
            'description' => 'Entdecken Sie die aktuelle Produktpalette von '.config('app.name'),
        ];

        // Entscheiden: X‑Inertia‑Header vorhanden → SPA, sonst Blade
        if ($request->header('X-Inertia')) {
            return Inertia::render('Home', $sharedData);
        }

        // Klassisches Blade‑View (kann z. B. von Suchmaschinen ge‑crawlt werden)
        return view('pages.home', $sharedData);
    }

}
