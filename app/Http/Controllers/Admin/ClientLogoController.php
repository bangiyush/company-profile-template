<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ClientLogoController extends Controller
{
    public function index()
    {
        $logos = ClientLogo::orderBy('sort_order')->get();
        return view('admin.client_logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.client_logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $logoFile = $request->file('logo');
        $filename = time() . '_' . $logoFile->getClientOriginalName();
        $path = 'clients/' . $filename;

        // Ensure directory exists using Storage facade
        if (!Storage::disk('public')->exists('clients')) {
            Storage::disk('public')->makeDirectory('clients');
        }

        // Auto-Resize using Intervention Image (v3)
        $manager = new ImageManager(new Driver());
        $image = $manager->read($logoFile);
        
        // Scale to a fixed height of 80px
        $image->scale(height: 80);
        
        // Save using the correct public disk path
        $image->save(Storage::disk('public')->path($path));

        ClientLogo::create([
            'name' => $request->name,
            'logo' => $path,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.client-logos.index')->with('success', 'Client logo added and auto-resized successfully!');
    }

    public function destroy(ClientLogo $clientLogo)
    {
        if ($clientLogo->logo) {
            Storage::disk('public')->delete($clientLogo->logo);
        }
        $clientLogo->delete();

        return back()->with('success', 'Client logo deleted successfully!');
    }

    public function toggleStatus(ClientLogo $clientLogo)
    {
        $clientLogo->is_active = !$clientLogo->is_active;
        $clientLogo->save();
        return back()->with('success', 'Status updated.');
    }
}
