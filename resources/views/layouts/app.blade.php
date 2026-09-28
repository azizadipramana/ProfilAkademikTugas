<!DOCTYPE html>
<html lang="id" class="{{ (request('mode') === 'dark' || ($isDarkMode ?? false)) ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', $title ?? 'Portal Akademik & Riset Agentic AI - ITS')</title>

    <!-- Meta Description & SEO -->
    <meta name="description" content="Mini-Website Akademik Mahasiswa & Visualisasi Platform Agentic AI ITS - Tugas 4 Pemrograman Berbasis Kerangka Kerja">
    <meta name="author" content="Aziz Adi Pramana">

    <!-- Fonts: Plus Jakarta Sans / Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Vite Assets (Tailwind CSS & JavaScript) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        code, pre {
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col transition-colors duration-300 {{ (request('mode') === 'dark' || ($isDarkMode ?? false)) ? 'bg-slate-950 text-slate-100' : 'bg-slate-50 text-slate-800' }}">

    <!-- ================= NAVBAR STATIS ================= -->
    <header class="sticky top-0 z-50 backdrop-blur-md transition-colors duration-300 {{ (request('mode') === 'dark' || ($isDarkMode ?? false)) ? 'bg-slate-900/90 border-b border-slate-800' : 'bg-white/95 border-b border-slate-200/80 shadow-xs' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Logo & Identitas Kampus ITS -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl bg-gradient-to-br from-[#013880] to-[#00b4d8] flex items-center justify-center text-white font-black text-lg shadow-md group-hover:scale-105 transition-transform duration-200">
                        <span>ITS</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-extrabold text-base sm:text-lg tracking-tight {{ (request('mode') === 'dark' || ($isDarkMode ?? false)) ? 'text-white' : 'text-[#013880]' }}">
                                PORTAL AKADEMIK
                            </span>
                            <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/60 dark:text-blue-300">
                                PBKK
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium hidden sm:block">
                            Institut Teknologi Sepuluh Nopember
                        </p>
                    </div>
                </a>

                <!-- Navigasi Menu Desktop -->
                <nav class="hidden md:flex items-center gap-1 sm:gap-2">
                    <a href="{{ route('home') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('home') || request()->routeIs('beranda') 
                            ? 'bg-[#013880] text-white shadow-sm' 
                            : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800' }}">
                        Beranda
                    </a>

                    <a href="{{ route('profil') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('profil') 
                            ? 'bg-[#013880] text-white shadow-sm' 
                            : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800' }}">
                        Profil Mahasiswa
                    </a>

                    <a href="{{ route('ide.agent') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('ide.agent') 
                            ? 'bg-[#013880] text-white shadow-sm' 
                            : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800' }}">
                        <span>Ide Riset Agentic AI</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    </a>
                </nav>

                <!-- Tombol Aksi Cepat / Quick Switcher -->
                <div class="flex items-center gap-2">
                    <!-- Shortcut Toggle Dark Mode (/ide-agent?mode=dark) -->
                    @if(request()->routeIs('ide.agent'))
                        <div class="flex items-center rounded-lg p-1 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs font-medium">
                            <a href="{{ route('ide.agent', ['mode' => 'light']) }}" 
                               class="px-2 py-1 rounded {{ !request('mode') || request('mode') === 'light' ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400' }}"
                               title="Mode Terang">
                                ☀️ Terang
                            </a>
                            <a href="{{ route('ide.agent', ['mode' => 'dark']) }}" 
                               class="px-2 py-1 rounded {{ request('mode') === 'dark' ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-500 hover:text-slate-900 dark:text-slate-400' }}"
                               title="Mode Gelap (Tantangan 1)">
                                🌙 Gelap
                            </a>
                        </div>
                    @else
                        <a href="{{ route('ide.agent', ['mode' => 'dark']) }}" 
                           class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors"
                           title="Uji Tantangan 1: Toggle Dark Mode">
                            <span>🌙 Mode Gelap</span>
                        </a>
                    @endif

                    <!-- Mobile Navigation Menu Toggle Button -->
                    <div class="md:hidden">
                        <button type="button" 
                                onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" 
                                class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none"
                                aria-label="Toggle navigation">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Mobile Navigation Drawer -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 pt-2 border-t border-slate-200 dark:border-slate-800 space-y-1">
                <a href="{{ route('home') }}" 
                   class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') || request()->routeIs('beranda') ? 'bg-[#013880] text-white' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Beranda
                </a>
                <a href="{{ route('profil') }}" 
                   class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('profil') ? 'bg-[#013880] text-white' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Profil Mahasiswa
                </a>
                <a href="{{ route('ide.agent') }}" 
                   class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('ide.agent') ? 'bg-[#013880] text-white' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Ide Riset Agentic AI
                </a>
            </div>

        </div>
    </header>

    <!-- ================= KONTEN UTAMA (@yield('content')) ================= -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- ================= FOOTER ITS ================= -->
    <footer class="mt-auto border-t transition-colors duration-300 {{ (request('mode') === 'dark' || ($isDarkMode ?? false)) ? 'bg-slate-900 border-slate-800 text-slate-400' : 'bg-slate-900 text-slate-300 border-slate-800' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- Kolom 1: Profil Institusi -->
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#013880] to-[#00b4d8] flex items-center justify-center text-white font-extrabold text-lg shadow-sm">
                            ITS
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-base tracking-wide">
                                INSTITUT TEKNOLOGI SEPULUH NOPEMBER
                            </h3>
                            <p class="text-xs text-slate-400">
                                Departemen Teknik Informatika • FTEIC
                            </p>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-md">
                        Mini-website akademik multi-view untuk implementasi master layout Blade, arsitektur MVC, komponen reusable, dan kompilasi aset lokal Vite dengan Tailwind CSS.
                    </p>
                    <div class="flex items-center gap-2 pt-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                            Tugas 4 PBKK
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            Akreditasi Unggul
                        </span>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi Halaman -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-3">
                        Menu Halaman
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                                <span class="text-blue-400">▸</span> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profil') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                                <span class="text-blue-400">▸</span> Profil Mahasiswa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ide.agent') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                                <span class="text-blue-400">▸</span> Ide Riset Agentic AI
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home', ['user' => 'Andi']) }}" class="hover:text-amber-400 transition-colors flex items-center gap-1.5">
                                <span class="text-amber-400">★</span> Tantangan: ?user=Andi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ide.agent', ['mode' => 'dark']) }}" class="hover:text-cyan-400 transition-colors flex items-center gap-1.5">
                                <span class="text-cyan-400">★</span> Tantangan: ?mode=dark
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak & Kampus -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-3">
                        Kampus & Lokasi
                    </h4>
                    <address class="not-italic text-xs sm:text-sm text-slate-400 space-y-1.5 leading-relaxed">
                        <p class="font-medium text-slate-300">Gedung Teknik Informatika, Lantai 1-4</p>
                        <p>Kampus ITS Sukolilo, Surabaya 60111</p>
                        <p>Jawa Timur, Indonesia</p>
                        <p class="pt-2 text-slate-400">
                            Mata Kuliah: <span class="text-white font-medium">Pemrograman Berbasis Kerangka Kerja</span>
                        </p>
                    </address>
                </div>

            </div>

            <!-- Garis batas & Copyright -->
            <div class="mt-8 pt-6 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>
                    &copy; {{ date('Y') }} Institut Teknologi Sepuluh Nopember (ITS). Dibuat oleh <span class="text-slate-300 font-semibold">Aziz Adi Pramana</span>.
                </p>
                <p class="flex items-center gap-2">
                    <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
                    <span>•</span>
                    <span>PHP v{{ PHP_VERSION }}</span>
                    <span>•</span>
                    <span>Tailwind CSS v4 + Vite</span>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
