<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\CompanySetting;
use App\Models\ContactMessage;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\ClientLogo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Get common data for all pages
     */
    private function getCommonData()
    {
        return [
            'settings' => CompanySetting::getSettings(),
        ];
    }

    public function home()
    {
        $data = array_merge($this->getCommonData(), [
            'hero' => HeroSection::active()->first(),
            'services' => Service::active()->featured()->ordered()->take(6)->get(),
            'about' => AboutSection::active()->first(),
            'testimonials' => Testimonial::active()->featured()->ordered()->take(3)->get(),
            'portfolios' => Portfolio::active()->featured()->ordered()->take(6)->get(),
            'clientLogos' => ClientLogo::active()->orderBy('sort_order')->get(),
        ]);

        return view('frontend.home', $data);
    }

    public function about()
    {
        $data = array_merge($this->getCommonData(), [
            'about' => AboutSection::active()->first(),
            'team' => TeamMember::active()->ordered()->take(4)->get(),
        ]);

        return view('frontend.about', $data);
    }

    public function services()
    {
        $data = array_merge($this->getCommonData(), [
            'services' => Service::active()->ordered()->get(),
        ]);

        return view('frontend.services', $data);
    }

    public function team()
    {
        $data = array_merge($this->getCommonData(), [
            'members' => TeamMember::active()->ordered()->get(),
        ]);

        return view('frontend.team', $data);
    }

    public function portfolio()
    {
        $data = array_merge($this->getCommonData(), [
            'portfolios' => Portfolio::active()->ordered()->get(),
            'categories' => Portfolio::getCategories(),
        ]);

        return view('frontend.portfolio', $data);
    }

    public function portfolioDetail(Portfolio $portfolio)
    {
        // Ensure the portfolio is active
        if (!$portfolio->is_active) {
            abort(404);
        }
        
        $data = array_merge($this->getCommonData(), [
            'portfolio' => $portfolio,
            // Related portfolios (from same category)
            'related' => Portfolio::active()
                ->where('category', $portfolio->category)
                ->where('id', '!=', $portfolio->id)
                ->take(3)
                ->get(),
        ]);

        return view('frontend.portfolio-detail', $data);
    }

    public function testimonials()
    {
        $data = array_merge($this->getCommonData(), [
            'testimonials' => Testimonial::active()->ordered()->get(),
        ]);

        return view('frontend.testimonials', $data);
    }

    public function contact()
    {
        return view('frontend.contact', $this->getCommonData());
    }

    public function sendMessage(Request $request)
    {
        // Simple Honeypot Check
        if ($request->filled('website_url')) {
            return back()->with('success', 'Thank you for your message! We will get back to you soon.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
