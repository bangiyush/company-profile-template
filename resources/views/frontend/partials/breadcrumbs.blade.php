@if(isset($breadcrumbs) && count($breadcrumbs) > 0)
<nav class="flex mb-8" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2 text-sm text-white/40">
        <li>
            <a href="{{ route('home') }}" class="hover:text-primary-400 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Home
            </a>
        </li>
        @foreach($breadcrumbs as $breadcrumb)
            <li>
                <svg class="w-4 h-4 text-white/20" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
            </li>
            @if($loop->last)
                <li class="text-white/80 line-clamp-1" aria-current="page">{{ $breadcrumb['name'] }}</li>
            @else
                <li>
                    <a href="{{ $breadcrumb['url'] }}" class="hover:text-primary-400">{{ $breadcrumb['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

{{-- Schema.org BreadcrumbList --}}
@section('schema')
@parent
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ route('home') }}"
    }
    @foreach($breadcrumbs as $index => $breadcrumb)
    ,{
      "@type": "ListItem",
      "position": {{ $index + 2 }},
      "name": "{{ $breadcrumb['name'] }}",
      "item": "{{ $breadcrumb['url'] }}"
    }
    @endforeach
  ]
}
</script>
@endsection
@endif
