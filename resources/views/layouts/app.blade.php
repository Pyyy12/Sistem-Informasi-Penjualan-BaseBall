<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HomeRun Gear Store - Authentic Baseball Equipment')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 flex flex-col min-h-screen selection:bg-emerald-500 selection:text-white">

    <!-- Top Announcement Bar -->
    <div class="bg-emerald-600 text-xs font-semibold py-1.5 text-center tracking-wider uppercase text-emerald-50">
        ⚾ Authentic Official MLB Gear & Free Shipping Seluruh Jabodetabek
    </div>

    <!-- Header Navigation -->
    <header class="border-b border-slate-800 bg-slate-900/80 backdrop-blur-md sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('products.index') }}" class="flex items-center gap-2">
                <span class="w-9 h-9 rounded-lg bg-emerald-500 text-slate-950 font-black flex items-center justify-center text-xl shadow-lg shadow-emerald-500/30">H</span>
                <div>
                    <span class="font-extrabold text-lg tracking-tight text-white block leading-none">HOMERUN<span class="text-emerald-400">GEAR</span></span>
                    <span class="text-[10px] text-slate-400 uppercase tracking-widest font-semibold">Pro Baseball Hub</span>
                </div>
            </a>

            <div class="flex items-center gap-4">
                <a href="{{ route('cart.index') }}" class="relative inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-sm font-semibold transition border border-slate-700">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span>Cart</span>
                    @php $cartCount = count(session('cart', [])); @endphp
                    @if($cartCount > 0)
                        <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold bg-emerald-500 text-slate-950 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </header>

    <!-- Flash Alert -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 w-full">
        @if(session('success'))
            <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 bg-slate-900 mt-auto py-8 text-center text-sm text-slate-500">
        <div class="max-w-7xl mx-auto px-4">
            <p class="font-medium text-slate-400">© {{ date('Y') }} HomeRun Gear Indonesia. Official Baseball & Softball Outfitter.</p>
            <p class="text-xs mt-1">Dibuat khusus untuk performa atlet di lapangan.</p>
        </div>
    </footer>
</body>
</html>