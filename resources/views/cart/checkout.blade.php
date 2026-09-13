@extends('layouts.app')

@section('title', 'Checkout Pengiriman - HomeRun Gear')

@section('content')
<h1 class="text-2xl font-extrabold text-white mb-6">Checkout & Pengiriman</h1>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <form action="{{ route('cart.processCheckout') }}" method="POST" class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama Lengkap Penerima</label>
                <input type="text" name="customer_name" required value="{{ old('customer_name') }}"
                       class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500">
                @error('customer_name') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email</label>
                    <input type="email" name="customer_email" required value="{{ old('customer_email') }}"
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500">
                    @error('customer_email') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nomor WhatsApp / HP</label>
                    <input type="text" name="customer_phone" required placeholder="0812xxxx" value="{{ old('customer_phone') }}"
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500">
                    @error('customer_phone') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Alamat Lengkap Pengiriman</label>
                <textarea name="shipping_address" rows="3" required placeholder="Nama Jalan, Nomor Rumah, Kecamatan, Kota, Kode Pos"
                          class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500">{{ old('shipping_address') }}</textarea>
                @error('shipping_address') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold rounded-xl transition mt-4">
                Konfirmasi Pembelian & Buat Pesanan
            </button>
        </form>
    </div>

    <!-- Mini Cart Order Summary -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 h-fit">
        <h3 class="font-bold text-white text-base mb-4">Ringkasan Pesanan</h3>
        <div class="divide-y divide-slate-800 mb-4">
            @foreach($cart as $item)
                <div class="py-3 flex justify-between items-center text-sm">
                    <div>
                        <p class="font-semibold text-slate-200 line-clamp-1">{{ $item['name'] }}</p>
                        <span class="text-xs text-slate-500">{{ $item['quantity'] }}x @ Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                    </div>
                    <span class="font-bold text-white text-xs">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>

        <div class="border-t border-slate-800 pt-4 flex justify-between items-center">
            <span class="font-bold text-slate-200">Total Tagihan</span>
            <span class="text-xl font-extrabold text-emerald-400">Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
@endsection