@extends('frontend.layouts.app')

@section('title', $portfolio->title . ' - Portfolio')

@php
    $breadcrumbs = [
        ['name' => 'Portfolio', 'url' => route('portfolio')],
        ['name' => $portfolio->title, 'url' => route('portfolio.detail', $portfolio)]
    ];
@endphp

@section('schema')
@parent
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CreativeWork",
  "name": "{{ $portfolio->title }}",
  "description": "{{ $portfolio->description }}",
  "image": "{{ $portfolio->image_url }}",
  "author": {
    "@type": "Organization",
    "name": "{{ $settings->company_name }}"
  },
  "datePublished": "{{ $portfolio->created_at->toIso8601String() }}"
}
</script>
@endsection

@section('content')
    <!-- Portfolio Hero Header -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if($portfolio->image_url)
                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover blur-sm opacity-20 scale-110">
            @endif
            <div class="absolute inset-0 bg-gradient-to-b from-dark-900 via-dark-900/90 to-dark-900"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            @include('frontend.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

            <div class="grid lg:grid-cols-2 gap-12 items-end">
                <div data-aos="fade-right">
                    @if($portfolio->category)
                        <span class="inline-block px-4 py-2 rounded-full bg-primary-500/10 text-primary-400 text-xs font-bold uppercase tracking-wider mb-4">
                            {{ $portfolio->category }}
                        </span>
                    @endif
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        {{ $portfolio->title }}
                    </h1>
                    <p class="text-xl text-white/60 mb-8 leading-relaxed">
                        {{ $portfolio->description }}
                    </p>
                </div>
                
                <div class="lg:flex lg:justify-end" data-aos="fade-left">
                    <div class="glass p-8 rounded-3xl w-full lg:max-w-sm">
                        <div class="space-y-6">
                            @if($portfolio->client_name)
                                <div>
                                    <p class="text-white/40 text-xs uppercase font-bold tracking-widest mb-1">Client</p>
                                    <p class="text-white font-semibold">{{ $portfolio->client_name }}</p>
                                </div>
                            @endif
                            @if($portfolio->completed_at)
                                <div>
                                    <p class="text-white/40 text-xs uppercase font-bold tracking-widest mb-1">Date</p>
                                    <p class="text-white font-semibold">{{ $portfolio->completed_at->format('F Y') }}</p>
                                </div>
                            @endif
                            @if($portfolio->project_url)
                                <div>
                                    <p class="text-white/40 text-xs uppercase font-bold tracking-widest mb-1">Live Project</p>
                                    <a href="{{ $portfolio->project_url }}" target="_blank" class="text-primary-400 hover:text-primary-300 font-semibold flex items-center gap-2">
                                        View Website
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content & Media -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">
                <!-- Main Project Image -->
                <div class="rounded-3xl overflow-hidden shadow-2xl shadow-primary-500/10" data-aos="zoom-in">
                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full aspect-video object-cover">
                </div>

                <!-- Case Study Details -->
                <div class="grid lg:grid-cols-3 gap-12 pt-12">
                    <div class="lg:col-span-2 space-y-8" data-aos="fade-up">
                        <h2 class="text-3xl font-bold text-white">Project Case Study</h2>
                        <div class="prose prose-invert max-w-none text-white/70 text-lg leading-relaxed">
                            {!! nl2br(e($portfolio->long_content)) !!}
                            @if(!$portfolio->long_content)
                                <p class="italic text-white/30">No detailed case study available for this project yet.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Side Features/Services -->
                    <div class="space-y-8" data-aos="fade-left">
                        <div class="glass p-8 rounded-3xl">
                            <h3 class="text-xl font-bold text-white mb-6 text-center">Interested?</h3>
                            <p class="text-white/60 mb-8 text-center text-sm">Let's bring your vision to life just like we did with {{ $portfolio->client_name ?? 'this project' }}.</p>
                            <a href="{{ route('contact') }}" class="block w-full py-4 text-center rounded-xl gradient-primary text-white font-bold hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                                Start Your Project
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section if exists -->
                @if($portfolio->gallery && count($portfolio->gallery) > 0)
                <div class="pt-24">
                    <h2 class="text-3xl font-bold text-white mb-12 text-center">Project Gallery</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($portfolio->gallery_urls as $url)
                            <div class="rounded-2xl overflow-hidden aspect-square">
                                <img src="{{ $url }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 cursor-pointer">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($related->count() > 0)
    <section class="py-24 bg-white/[0.02]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-12 text-center">Related Projects</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($related as $item)
                    <a href="{{ route('portfolio.detail', $item) }}" class="group block glass rounded-2xl overflow-hidden hover-lift">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <span class="text-primary-400 text-xs font-bold uppercase tracking-wider mb-2 block">{{ $item->category }}</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-primary-400 transition-colors">{{ $item->title }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
