<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function edit()
    {
        $settings = CompanySetting::getSettings();
        return view('admin.settings.general', compact('settings'));
    }

    public function seo()
    {
        $settings = CompanySetting::getSettings();
        return view('admin.settings.seo', compact('settings'));
    }

    public function integrations()
    {
        $settings = CompanySetting::getSettings();
        return view('admin.settings.integrations', compact('settings'));
    }

    public function update(Request $request, string $type)
    {
        $settings = CompanySetting::getSettings();
        
        $rules = [];
        if ($type === 'general') {
            $rules = [
                'company_name' => 'required|string|max:255',
                'tagline' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:500',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'youtube' => 'nullable|url|max:255',
                'whatsapp' => 'nullable|string|max:50',
                'primary_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'secondary_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'accent_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'bg_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'text_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'card_color' => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'favicon' => 'nullable|image|mimes:ico,png,jpg|max:1024',
            ];
        } elseif ($type === 'seo') {
            $rules = [
                'description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
            ];
        } elseif ($type === 'integrations') {
            $rules = [
                'google_analytics_id' => 'nullable|string|max:50',
                'header_scripts' => 'nullable|string',
                'footer_scripts' => 'nullable|string',
            ];
        }

        $validated = $request->validate($rules);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                Storage::disk('public')->delete($settings->logo);
            }
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($settings->favicon) {
                Storage::disk('public')->delete($settings->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $settings->fill($validated);
        $settings->save();

        return back()->with('success', ucfirst($type) . ' settings updated successfully!');
    }

    public function deleteImage(string $field)
    {
        $settings = CompanySetting::getSettings();

        if (in_array($field, ['logo', 'favicon']) && $settings->$field) {
            Storage::disk('public')->delete($settings->$field);
            $settings->$field = null;
            $settings->save();
            return back()->with('success', ucfirst($field) . ' deleted successfully!');
        }

        return back()->with('error', 'Image not found.');
    }
}
