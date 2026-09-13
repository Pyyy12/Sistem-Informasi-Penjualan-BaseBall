@extends('layouts.app')

@section('title', 'Pesanan Berhasil - HomeRun Gear')

@section('content')
<div class="max-w-2xl mx-auto bg-slate-900 border border-slate-800 rounded-3xl p-8 sm:p-10 text-center">
    <div class="w-16 h-16 bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
    </div>

    <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Order Confirmed</span>
    <h1 class="text-2xl sm:text-3xl font-extrabold text-white mt-2">Terima Kasih Atas Pesanan Anda!</h1>
    <p class="text-slate-400 text-sm mt-2">Nomor Invoice ID: <strong class="text-white font-mono">{{ $order->order_code }}</strong></p>

    <div class="mt-8 p-5 bg-slate-950 rounded-2xl border border-slate-800 text-left text-sm space-y-2">
        <div class="flex justify-between">
            <span class="text-slate-500">Penerima:</span>
            <span class="font-semibold text-slate-200">{{ $order->customer_name }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-slate-500">Kontak:</span>
            <span class="text-slate-200">{{ $order->customer_phone }} ({{ $order->customer_email }})</span>
        </div>
        <div class="flex justify-between">
            <span class="text-slate-500">Total Pembayaran:</span>
            <span class="font-bold text-emerald-400">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>
        <div class="pt-2 border-t border-slate-800 text-xs text-slate-400">
            <strong>Alamat:</strong> {{ $order->shipping_address }}
        </div>
    </div>

    <div class="mt-8 flex justify-center gap-4">
        <a href="{{ route('products.index') }}" class="px-6 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl text-sm transition">
            Kembali Belanja
        </a>
    </div>
</div>
@endsection