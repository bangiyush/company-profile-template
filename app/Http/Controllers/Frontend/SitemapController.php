<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        $portfolios = Portfolio::all();

        return response()->view('frontend.sitemap', [
            'services' => $services,
            'portfolios' => $portfolios,
        ])->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
