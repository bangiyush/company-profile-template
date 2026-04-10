@extends('admin.layouts.app')

@section('title', 'Add Client Logo')
@section('subtitle', 'Upload a new client logo to the marquee')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.client-logos.store') }}" enctype="multipart/form-data" class="admin-card p-8 space-y-6">
        @csrf

        <div>
            <label for="name" class="form-label">Client Name <span class="text-red-400">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                class="form-input" placeholder="e.g. Google, Apple, etc.">
        </div>

        <div>
            <label for="logo" class="form-label">Logo Image <span class="text-red-400">*</span></label>
            <input type="file" id="logo" name="logo" accept="image/*" required class="form-input">
            <p class="mt-2 text-xs text-white/40 italic">Note: All logos will be automatically resized to 80px height for consistency.</p>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="sort_order" class="form-label">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-input">
            </div>
            <div class="flex items-end pb-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="w-5 h-5 rounded bg-white/5 border-white/10 text-primary-500 focus:ring-primary-500/20">
                    <span class="text-white/80 font-medium">Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-8 py-3 rounded-lg btn-primary text-white font-medium">Upload Logo</button>
            <a href="{{ route('admin.client-logos.index') }}" class="px-8 py-3 rounded-lg bg-white/5 text-white/60 hover:text-white transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
