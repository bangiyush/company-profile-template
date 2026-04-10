@extends('admin.layouts.app')

@section('title', 'General Settings')
@section('subtitle', 'Configure your basic company information and branding')

@section('content')
    <div class="max-w-4xl">
        {{-- Delete Image Forms --}}
        @if($settings->logo)
            <form id="delete-logo-form" method="POST" action="{{ route('admin.settings.delete-image', 'logo') }}" class="hidden">
                @csrf
            </form>
        @endif
        @if($settings->favicon)
            <form id="delete-favicon-form" method="POST" action="{{ route('admin.settings.delete-image', 'favicon') }}" class="hidden">
                @csrf
            </form>
        @endif

        <form method="POST" action="{{ route('admin.settings.update', 'general') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="admin-card p-6">
                <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Basic Information</h2>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_name" class="form-label">Company Name <span class="text-red-400">*</span></label>
                            <input type="text" id="company_name" name="company_name"
                                value="{{ old('company_name', $settings->company_name) }}" required class="form-input">
                        </div>
                        <div>
                            <label for="tagline" class="form-label">Tagline</label>
                            <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $settings->tagline) }}"
                                class="form-input" placeholder="Your company tagline">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="form-label">Company Description (Footer / About)</label>
                        <textarea id="description" name="description" rows="3"
                            class="form-input">{{ old('description', $settings->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="logo" class="form-label">Logo</label>
                            @if($settings->logo)
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="{{ $settings->logo_url }}" alt="Logo" class="h-16 object-contain">
                                    <button type="button"
                                        onclick="if(confirm('Delete logo?')) document.getElementById('delete-logo-form').submit();"
                                        class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                        title="Delete Logo">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <input type="file" id="logo" name="logo" accept="image/*" class="form-input">
                        </div>
                        <div>
                            <label for="favicon" class="form-label">Favicon</label>
                            @if($settings->favicon)
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="{{ $settings->favicon_url }}" alt="Favicon" class="h-8 object-contain">
                                    <button type="button"
                                        onclick="if(confirm('Delete favicon?')) document.getElementById('delete-favicon-form').submit();"
                                        class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors"
                                        title="Delete Favicon">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <input type="file" id="favicon" name="favicon" accept="image/*,.ico" class="form-input">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="admin-card p-6">
                <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Contact Information</h2>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $settings->email) }}"
                                class="form-input" placeholder="contact@company.com">
                        </div>
                        <div>
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}"
                                class="form-input" placeholder="+1 (555) 123-4567">
                        </div>
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" rows="2"
                            class="form-input">{{ old('address', $settings->address) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Theme Colors -->
            <div class="admin-card p-6">
                <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Branding & Colors</h2>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="primary_color" class="form-label">Primary Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="primary_color" name="primary_color" 
                                    value="{{ old('primary_color', $settings->primary_color) }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('primary_color', $settings->primary_color) }}" 
                                    oninput="document.getElementById('primary_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                        <div>
                            <label for="secondary_color" class="form-label">Secondary Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="secondary_color" name="secondary_color" 
                                    value="{{ old('secondary_color', $settings->secondary_color) }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('secondary_color', $settings->secondary_color) }}" 
                                    oninput="document.getElementById('secondary_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                        <div>
                            <label for="accent_color" class="form-label">Accent Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="accent_color" name="accent_color" 
                                    value="{{ old('accent_color', $settings->accent_color) }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('accent_color', $settings->accent_color) }}" 
                                    oninput="document.getElementById('accent_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-white/5">
                        <div>
                            <label for="bg_color" class="form-label">Background Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="bg_color" name="bg_color" 
                                    value="{{ old('bg_color', $settings->bg_color ?? '#0f0f23') }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('bg_color', $settings->bg_color ?? '#0f0f23') }}" 
                                    oninput="document.getElementById('bg_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                        <div>
                            <label for="text_color" class="form-label">Main Text Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="text_color" name="text_color" 
                                    value="{{ old('text_color', $settings->text_color ?? '#ffffff') }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('text_color', $settings->text_color ?? '#ffffff') }}" 
                                    oninput="document.getElementById('text_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                        <div>
                            <label for="card_color" class="form-label">Card / Glass Color</label>
                            <div class="flex gap-2">
                                <input type="color" id="card_color" name="card_color" 
                                    value="{{ old('card_color', $settings->card_color ?? '#ffffff') }}" class="h-10 w-20 p-1 rounded-lg bg-white/5 border border-white/10">
                                <input type="text" value="{{ old('card_color', $settings->card_color ?? '#ffffff') }}" 
                                    oninput="document.getElementById('card_color').value = this.value" class="form-input flex-1 uppercase">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="admin-card p-6">
                <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Social Media</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $settings->facebook) }}"
                            class="form-input" placeholder="https://facebook.com/...">
                    </div>
                    <div>
                        <label for="twitter" class="form-label">Twitter / X</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter) }}"
                            class="form-input" placeholder="https://twitter.com/...">
                    </div>
                    <div>
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="url" id="instagram" name="instagram"
                            value="{{ old('instagram', $settings->instagram) }}" class="form-input"
                            placeholder="https://instagram.com/...">
                    </div>
                    <div>
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin) }}"
                            class="form-input" placeholder="https://linkedin.com/company/...">
                    </div>
                    <div>
                        <label for="youtube" class="form-label">YouTube Channel</label>
                        <input type="url" id="youtube" name="youtube" value="{{ old('youtube', $settings->youtube) }}"
                            class="form-input" placeholder="https://youtube.com/c/...">
                    </div>
                    <div>
                        <label for="whatsapp" class="form-label">WhatsApp Number</label>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}"
                            class="form-input" placeholder="628123456789">
                    </div>
                </div>
            </div>

            <button type="submit" class="px-8 py-3 rounded-xl btn-primary text-white font-bold shadow-lg">Update General Settings</button>
        </form>
    </div>
@endsection
