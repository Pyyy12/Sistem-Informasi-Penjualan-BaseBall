@extends('layouts.app')

@section('title', $product->name . ' - HomeRun Gear')

@section('content')
<nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
    <a href="{{ route('products.index') }}" class="hover:text-emerald-400">Home</a>
    <span>/</span>
    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-emerald-400">{{ $product->category->name }}</a>
    <span>/</span>
    <span class="text-slate-200 truncate">{{ $product->name }}</span>
</nav>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-slate-900/60 border border-slate-800 rounded-3xl p-6 sm:p-8">
    <div class="aspect-square rounded-2xl overflow-hidden bg-slate-950 border border-slate-800">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
    </div>

    <div class="flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 rounded-md text-xs font-bold uppercase bg-slate-800 text-emerald-400 border border-slate-700">{{ $product->brand }}</span>
                <span class="text-xs text-slate-400">Stok: <strong class="text-slate-200">{{ $product->stock }} unit</strong></span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-white mt-4">{{ $product->name }}</h1>

            <div class="mt-4 pb-4 border-b border-slate-800">
                <span class="text-3xl font-black text-emerald-400">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>

            <div class="mt-6">
                <h3 class="text-sm font-bold text-slate-200 uppercase tracking-wider">Spesifikasi & Deskripsi</h3>
                <p class="text-slate-400 text-sm mt-2 leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
            </div>
        </div>

        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-8 pt-6 border-t border-slate-800 flex items-center gap-4">
            @csrf
            <div class="w-28">
                <label for="quantity" class="text-xs text-slate-400 block mb-1 font-semibold">Jumlah</label>
                <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->stock }}" value="1"
                       class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-sm text-center text-white focus:outline-none focus:border-emerald-500">
            </div>
            <button type="submit" class="flex-grow mt-5 py-2.5 px-6 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span>Masukkan Keranjang</span>
            </button>
        </form>
    </div>
</div>

<!-- Related Products -->
@if($relatedProducts->isNotEmpty())
<div class="mt-14">
    <h3 class="text-lg font-bold text-white mb-6">Produk Terkait di Kategori Ini</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $rel)
            <a href="{{ route('products.show', $rel->slug) }}" class="bg-slate-900 border border-slate-800 rounded-2xl p-4 block hover:border-slate-700 transition">
                <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}" class="w-full aspect-square object-cover rounded-xl mb-3">
                <h4 class="text-sm font-semibold text-white line-clamp-1">{{ $rel->name }}</h4>
                <p class="text-sm font-bold text-emerald-400 mt-1">Rp {{ number_format($rel->price, 0, ',', '.') }}</p>
            </a>
        @endforeach
    </div>
</div>
@endif
@endsection