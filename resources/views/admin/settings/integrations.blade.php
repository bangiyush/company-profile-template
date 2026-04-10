@extends('admin.layouts.app')

@section('title', 'Integration Settings')
@section('subtitle', 'Connect third-party services and add custom scripts')

@section('content')
    <div class="max-w-4xl">
        <form method="POST" action="{{ route('admin.settings.update', 'integrations') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Google Analytics -->
            <div class="admin-card p-6">
                <div class="flex items-center gap-3 mb-6 border-b border-white/10 pb-4">
                    <div class="w-10 h-10 rounded-lg bg-[#F9AB00]/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#F9AB00]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9c0-.28.22-.5.5-.5s.5.22.5.5v9c0 .28-.22.5-.5.5s-.5-.22-.5-.5zm-4 0v-4c0-.28.22-.5.5-.5s.5.22.5.5v4c0 .28-.22.5-.5.5s-.5-.22-.5-.5zm8 0v-6c0-.28.22-.5.5-.5s.5.22.5.5v6c0 .28-.22.5-.5.5s-.5-.22-.5-.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Google Analytics</h2>
                        <p class="text-xs text-white/40">Track website traffic and user behavior</p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label for="google_analytics_id" class="form-label">Google Analytics ID (GT-XXXXXXX / UA-XXXXXXX-X)</label>
                        <input type="text" id="google_analytics_id" name="google_analytics_id" 
                            value="{{ old('google_analytics_id', $settings->google_analytics_id) }}" 
                            class="form-input" placeholder="G-123456789">
                        <p class="text-xs text-white/40 mt-2">Enter your Measurement ID to automatically enable tracking.</p>
                    </div>
                </div>
            </div>

            <!-- Custom Scripts -->
            <div class="admin-card p-6">
                <div class="flex items-center gap-3 mb-6 border-b border-white/10 pb-4">
                    <div class="w-10 h-10 rounded-lg bg-primary-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Custom Scripts</h2>
                        <p class="text-xs text-white/40">Inject custom code into the website headers or footers</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label for="header_scripts" class="form-label">Header Scripts (CSS, Meta, Tags)</label>
                        <textarea id="header_scripts" name="header_scripts" rows="6"
                            class="form-input font-mono text-sm" placeholder="<style>...</style> atau <script>...</script>">{{ old('header_scripts', $settings->header_scripts) }}</textarea>
                        <p class="text-xs text-white/40 mt-2">These scripts will be placed inside the <code class="text-primary-400">&lt;head&gt;</code> tag.</p>
                    </div>

                    <div>
                        <label for="footer_scripts" class="form-label">Footer Scripts (JS, Chat Widgets)</label>
                        <textarea id="footer_scripts" name="footer_scripts" rows="6"
                            class="form-input font-mono text-sm" placeholder="<!-- Live Chat Script -->">{{ old('footer_scripts', $settings->footer_scripts) }}</textarea>
                        <p class="text-xs text-white/40 mt-2">These scripts will be placed before the closing <code class="text-primary-400">&lt;/body&gt;</code> tag.</p>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-xl">
                <div class="flex gap-3">
                    <svg class="w-5 h-5 text-yellow-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p class="text-sm text-yellow-500/90">
                        <strong>Be careful:</strong> Adding invalid scripts can break your website. Test any custom code before saving.
                    </p>
                </div>
            </div>

            <button type="submit" class="px-8 py-3 rounded-xl btn-primary text-white font-bold shadow-lg">Save Integration Settings</button>
        </form>
    </div>
@endsection
