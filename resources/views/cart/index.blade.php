@extends('layouts.app')

@section('title', 'Keranjang Belanja - HomeRun Gear')

@section('content')
<h1 class="text-2xl font-extrabold text-white mb-6">Keranjang Belanja</h1>

@if(empty($cart))
    <div class="bg-slate-900/60 border border-slate-800 rounded-3xl p-12 text-center">
        <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <p class="text-slate-300 font-semibold">Keranjang belanja Anda masih kosong.</p>
        <p class="text-slate-500 text-sm mt-1">Yuk pilih sarung tangan atau bat impianmu sekarang!</p>
        <a href="{{ route('products.index') }}" class="inline-block mt-6 px-6 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl text-sm transition">
            Lihat Katalog Baseball
        </a>
    </div>
@else
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-4">
            @foreach($cart as $id => $item)
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 sm:p-5 flex flex-col sm:flex-row items-center gap-4">
                    <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-xl bg-slate-950">
                    
                    <div class="flex-grow text-center sm:text-left">
                        <span class="text-[11px] font-bold text-emerald-400 uppercase tracking-wider">{{ $item['brand'] }}</span>
                        <h2 class="font-bold text-white text-sm"><a href="{{ route('products.show', $item['slug']) }}">{{ $item['name'] }}</a></h2>
                        <span class="text-slate-400 text-xs mt-1 block">Rp {{ number_format($item['price'], 0, ',', '.') }} / unit</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" class="w-16 bg-slate-950 border border-slate-700 rounded-lg py-1 px-2 text-center text-sm text-white">
                            <button type="submit" class="text-xs bg-slate-800 hover:bg-slate-700 px-2 py-1.5 rounded-lg border border-slate-700 text-slate-300">Update</button>
                        </form>

                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-400 hover:text-rose-300 p-2" title="Hapus item">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 h-fit">
            <h3 class="font-bold text-white text-base mb-4">Ringkasan Belanja</h3>
            <div class="space-y-3 pb-4 border-b border-slate-800 text-sm">
                <div class="flex justify-between text-slate-400">
                    <span>Subtotal</span>
                    <span class="text-slate-200">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>Estimasi Ongkir</span>
                    <span class="text-emerald-400 font-semibold">GRATIS</span>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4 mb-6">
                <span class="font-bold text-slate-200">Total Tagihan</span>
                <span class="text-xl font-extrabold text-white">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <a href="{{ route('cart.checkout') }}" class="w-full block text-center py-3 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl transition">
                Lanjut ke Checkout
            </a>
        </div>
    </div>
@endif
@endsection