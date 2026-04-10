@extends('admin.layouts.app')

@section('title', 'Client Logos')
@section('subtitle', 'Manage company logos displayed in the marquee section')

@section('content')
<div class="space-y-6">
    <div class="flex justify-end">
        <a href="{{ route('admin.client-logos.create') }}" class="px-6 py-3 rounded-lg btn-primary text-white font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New Logo
        </a>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/5 border-b border-white/10 text-white/60 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Preview</th>
                        <th class="px-6 py-4 font-semibold">Name</th>
                        <th class="px-6 py-4 font-semibold">Sort Order</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($logos as $logo)
                        <tr class="text-white/80 hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4">
                                <div class="bg-white/10 rounded-lg p-2 inline-block">
                                    <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" class="h-10 object-contain">
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">{{ $logo->name }}</td>
                            <td class="px-6 py-4">{{ $logo->sort_order }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.client-logos.toggle', $logo->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $logo->is_active ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                        {{ $logo->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.client-logos.destroy', $logo->id) }}" method="POST" onsubmit="return confirm('Delete this logo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-white/40">
                                No client logos added yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
