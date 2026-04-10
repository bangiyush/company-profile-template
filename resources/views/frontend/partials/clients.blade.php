<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Companies That Trust Us</h2>
            <p class="text-white/60 max-w-2xl mx-auto">We've had the privilege of working with some of the most innovative brands in the industry.</p>
        </div>

        <!-- Marquee Wrapper (Transparent) -->
        <div class="relative flex overflow-x-hidden">
            <div class="animate-marquee whitespace-nowrap flex items-center gap-16 md:gap-24 py-4">
                {{-- First Set --}}
                @forelse($clientLogos as $logo)
                    <div class="flex items-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer group">
                        @if($logo->logo)
                            <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" class="h-12 md:h-16 w-auto object-contain" 
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        @endif
                        <span class="text-white font-bold text-2xl md:text-3xl tracking-tight {{ $logo->logo ? 'hidden' : '' }}">{{ $logo->name }}</span>
                    </div>
                @empty
                    {{-- Dummy logos if no data in DB --}}
                    @foreach(['TechFlow', 'NEXUS', 'CloudNine', 'APEX', 'Velocity'] as $name)
                        <div class="flex items-center grayscale opacity-40 transition-all">
                            <span class="text-white font-bold text-2xl md:text-3xl tracking-tight opacity-20">{{ $name }}</span>
                        </div>
                    @endforeach
                @endforelse

                {{-- Second Set for Infinite Effect --}}
                @foreach($clientLogos as $logo)
                    <div class="flex items-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer group">
                        @if($logo->logo)
                            <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" class="h-12 md:h-16 w-auto object-contain"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        @endif
                        <span class="text-white font-bold text-2xl md:text-3xl tracking-tight {{ $logo->logo ? 'hidden' : '' }}">{{ $logo->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>
