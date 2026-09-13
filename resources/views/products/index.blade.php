@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-emerald-950 border border-slate-800 p-8 md:p-12 mb-10 shadow-2xl">
    <div class="max-w-2xl relative z-10">
        <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-400 rounded-full border border-emerald-500/30">Pro Edition 2026</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4 leading-tight">
            Perlengkapan Baseball Original & Standar MLB
        </h1>
        <p class="text-slate-400 text-sm sm:text-base mt-3 leading-relaxed">
            Temukan tongkat maple premium, glove kulit steerhide pilihan, dan gear pelindung lengkap untuk mendominasi setiap inning.
        </p>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-8">
    <!-- Category Pills -->
    <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-none">
        <a href="{{ route('products.index') }}"
           class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition border {{ !$selectedCategory ? 'bg-emerald-500 text-slate-950 border-emerald-400 font-bold' : 'bg-slate-900 text-slate-300 border-slate-800 hover:border-slate-700' }}">
            Semua Produk
        </a>
        @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug, 'search' => $search]) }}"
               class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition border {{ $selectedCategory == $category->slug ? 'bg-emerald-500 text-slate-950 border-emerald-400 font-bold' : 'bg-slate-900 text-slate-300 border-slate-800 hover:border-slate-700' }}">
                {{ $category->name }} ({{ $category->products_count }})
            </a>
        @endforeach
    </div>

    <!-- Search Box -->
    <form method="GET" action="{{ route('products.index') }}" class="w-full md:w-80">
        @if($selectedCategory)
            <input type="hidden" name="category" value="{{ $selectedCategory }}">
        @endif
        <div class="relative">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama alat / brand..."
                   class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            <button type="submit" class="absolute right-3 top-2.5 text-slate-400 hover:text-emerald-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </button>
        </div>
    </form>
</div>

<!-- Product Grid -->
@if($products->isEmpty())
    <div class="text-center py-16 bg-slate-900/50 rounded-2xl border border-slate-800">
        <p class="text-slate-400 text-base">Tidak ada gear baseball yang cocok dengan kriteria pencarian.</p>
        <a href="{{ route('products.index') }}" class="inline-block mt-4 text-sm font-semibold text-emerald-400 hover:underline">Reset Filter</a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-slate-900 rounded-2xl border border-slate-800 overflow-hidden flex flex-col group hover:border-slate-700 transition duration-200">
                <a href="{{ route('products.show', $product->slug) }}" class="relative aspect-square overflow-hidden bg-slate-950">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 left-3 bg-slate-950/80 backdrop-blur-sm text-[11px] font-bold text-emerald-400 px-2.5 py-1 rounded-lg border border-slate-800">
                        {{ $product->brand }}
                    </span>
                </a>
                <div class="p-5 flex flex-col flex-grow">
                    <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">{{ $product->category->name }}</span>
                    <a href="{{ route('products.show', $product->slug) }}" class="mt-1 font-bold text-white group-hover:text-emerald-400 line-clamp-2 transition text-sm">
                        {{ $product->name }}
                    </a>
                    <div class="mt-4 pt-4 border-t border-slate-800 flex items-center justify-between mt-auto">
                        <div>
                            <span class="text-[11px] text-slate-400 block">Harga</span>
                            <span class="text-base font-extrabold text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="p-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 rounded-xl transition font-bold" title="Tambahkan ke Keranjang">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
@endif
@endsection