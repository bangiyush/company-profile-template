@extends('admin.layouts.app')

@section('title', 'SEO Settings')
@section('subtitle', 'Optimize your website for search engines')

@section('content')
    <div class="max-w-4xl">
        <form method="POST" action="{{ route('admin.settings.update', 'seo') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="admin-card p-6">
                <h2 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Meta Information</h2>
                <div class="space-y-6">
                    <div>
                        <label for="description" class="form-label">Default Meta Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="form-input" placeholder="Enter a compelling description for search results...">{{ old('description', $settings->description) }}</textarea>
                        <p class="text-xs text-white/40 mt-2">Recommended: 150-160 characters. This appears in search fragments.</p>
                    </div>

                    <div>
                        <label for="meta_keywords" class="form-label">Meta Keywords (Comma separated)</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" 
                            value="{{ old('meta_keywords', $settings->meta_keywords) }}" 
                            class="form-input" placeholder="web design, agency, creative, portfolio">
                        <p class="text-xs text-white/40 mt-2">Helpful for some search engines to understand page topics.</p>
                    </div>
                </div>
            </div>

            <div class="admin-card p-6 border-l-4 border-primary-500">
                <h3 class="text-lg font-semibold text-white mb-2">SEO Tip</h3>
                <p class="text-white/60 text-sm">
                    Keep your descriptions unique and informative. Including keywords naturally in your description can improve click-through rates from search engine results pages.
                </p>
            </div>

            <button type="submit" class="px-8 py-3 rounded-xl btn-primary text-white font-bold shadow-lg">Save SEO Settings</button>
        </form>
    </div>
@endsection
