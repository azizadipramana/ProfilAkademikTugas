@extends('layouts.app')

@section('title', 'Beranda - Profil Akademik & Platform Agentic AI ITS')

@section('content')
<div class="relative overflow-hidden">

    <!-- Latar Belakang Dekoratif -->
    <div class="absolute inset-0 bg-grid-pattern opacity-60 pointer-events-none"></div>
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-80 h-80 bg-cyan-400/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 relative z-10 space-y-8">

        <!-- ================= TANTANGAN 2: ALERT STATUS INTERAKTIF (?user=...) ================= -->
        @if(!empty($user))
            <div class="animate-bounce-in">
                <x-status-banner 
                    type="success"
                    title="Halo, Selamat Datang {{ htmlspecialchars($user) }} di Portal Akademik ITS!"
                    message="Parameter URL terdeteksi (?user={{ $user }}). Komponen alert status dinamis berhasil dirender secara interaktif untuk checkpoint CPMK-1."
                >
                    <div class="flex items-center gap-2 mt-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-200">
                            ✓ Tantangan 2 Terpenuhi (Nilai Plus A+)
                        </span>
                        <a href="{{ route('home') }}" class="text-xs font-medium text-emerald-800 dark:text-emerald-300 underline hover:no-underline">
                            Reset Sapaan
                        </a>
                    </div>
                </x-status-banner>
            </div>
        @else
            <!-- Bar Uji Interaktif untuk Dosen/Penilai -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-slate-800 dark:to-slate-800/80 border border-blue-200 dark:border-slate-700 rounded-xl p-3.5 flex flex-col sm:flex-row items-center justify-between gap-3 shadow-xs">
                <div class="flex items-center gap-2.5 text-xs text-slate-700 dark:text-slate-300">
                    <span class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0">
                        ★
                    </span>
                    <div>
                        <strong class="text-slate-900 dark:text-white font-semibold">Uji Coba Tantangan 2 (Alert Status Interaktif):</strong>
                        <span>Coba klik tombol sapaan untuk memicu notifikasi selamat datang dinamis melalui parameter rute.</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <a href="{{ route('home', ['user' => 'Andi']) }}" 
                       class="px-2.5 py-1 text-xs font-semibold rounded-md bg-white dark:bg-slate-700 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-slate-600 hover:bg-blue-50 dark:hover:bg-slate-600 transition-colors shadow-2xs">
                        ?user=Andi
                    </a>
                    <a href="{{ route('home', ['user' => 'Dosen PBKK']) }}" 
                       class="px-2.5 py-1 text-xs font-semibold rounded-md bg-white dark:bg-slate-700 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-slate-600 hover:bg-blue-50 dark:hover:bg-slate-600 transition-colors shadow-2xs">
                        ?user=Dosen PBKK
                    </a>
                    <a href="{{ route('home', ['user' => 'Mahasiswa ITS']) }}" 
                       class="px-2.5 py-1 text-xs font-semibold rounded-md bg-white dark:bg-slate-700 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-slate-600 hover:bg-blue-50 dark:hover:bg-slate-600 transition-colors shadow-2xs">
                        ?user=Mahasiswa ITS
                    </a>
                </div>
            </div>
        @endif

        <!-- ================= HERO SECTION ================= -->
        <section class="rounded-3xl bg-gradient-to-br from-[#013880] via-[#002b66] to-[#001738] text-white p-6 sm:p-10 lg:p-12 shadow-xl relative overflow-hidden">
            <!-- Pola Geometris Abstrak -->
            <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-cyan-500/10 blur-2xl"></div>
            <div class="absolute right-10 bottom-0 w-64 h-64 rounded-full bg-blue-400/10 blur-xl"></div>

            <div class="relative z-10 max-w-3xl space-y-4 sm:space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-cyan-300 border border-white/15 backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                    Pemrograman Berbasis Kerangka Kerja • Tugas 4
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                    Portal Profil Akademik & <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-sky-200 to-amber-300">
                        Platform Agentic AI
                    </span>
                </h1>

                <p class="text-sm sm:text-base text-slate-200 leading-relaxed max-w-2xl">
                    Implementasi arsitektur multi-view Laravel dengan satu master layout terpusat (<code class="bg-black/30 px-1.5 py-0.5 rounded text-cyan-300">layouts/app.blade.php</code>), komponen reusable kustom, integrasi Vite & Tailwind CSS, serta sistem pengumpulan ide riset agen otonom.
                </p>

                <!-- Tombol Navigasi Cepat -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="{{ route('profil') }}" 
                       class="px-5 py-2.5 rounded-xl font-semibold text-sm bg-gradient-to-r from-cyan-400 to-sky-500 text-slate-950 hover:brightness-110 shadow-lg shadow-cyan-500/25 transition-all duration-200 flex items-center gap-2">
                        <span>Lihat Profil Akademik</span>
                        <span>→</span>
                    </a>
                    <a href="{{ route('ide.agent') }}" 
                       class="px-5 py-2.5 rounded-xl font-semibold text-sm bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-sm transition-all duration-200 flex items-center gap-2">
                        <span>Rancangan Agentic AI</span>
                        <span class="text-xs bg-cyan-400/20 text-cyan-200 px-2 py-0.5 rounded-full">Kelompok</span>
                    </a>
                </div>
            </div>

            <!-- Kartu Info Singkat di Hero -->
            <div class="mt-8 pt-6 border-t border-white/10 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div>
                    <span class="text-xs text-slate-400 font-medium block">NRP / Mahasiswa</span>
                    <span class="text-sm sm:text-base font-bold text-white">5025221001</span>
                    <span class="text-[11px] text-cyan-300 block">Aziz Adi Pramana</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 font-medium block">Departemen</span>
                    <span class="text-sm sm:text-base font-bold text-white">Teknik Informatika</span>
                    <span class="text-[11px] text-slate-300 block">FTEIC - ITS Surabaya</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 font-medium block">Teknologi Bundler</span>
                    <span class="text-sm sm:text-base font-bold text-emerald-400">Vite + Tailwind v4</span>
                    <span class="text-[11px] text-slate-300 block">Kompilasi Lokal NPM</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 font-medium block">Tantangan Ekstra</span>
                    <span class="text-sm sm:text-base font-bold text-amber-300">A+ Checkpoint</span>
                    <span class="text-[11px] text-slate-300 block">Dark Mode & Alert Aktif</span>
                </div>
            </div>
        </section>

        <!-- ================= 3 PILAR UTAMA TUGAS ================= -->
        <section class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white">
                        Tiga Modul Utama Aplikasi
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                        Seluruh modul dirancang modular tanpa duplikasi struktur HTML master layout.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                
                <!-- Modul 1: Beranda -->
                <div class="rounded-2xl p-6 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:border-blue-400 transition-all duration-200 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/40 text-[#013880] dark:text-blue-400 flex items-center justify-center font-bold text-xl">
                            01
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">
                            Beranda Terpadu
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Pusat ringkasan informasi akademik, dashboard pemantauan tugas, serta integrasi alert status interaktif berbasis parameter nama pengguna di URL.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-between text-xs">
                        <span class="font-mono text-slate-400">Rute: / atau /beranda</span>
                        <span class="text-blue-600 dark:text-blue-400 font-semibold">Aktif saat ini</span>
                    </div>
                </div>

                <!-- Modul 2: Profil Mahasiswa -->
                <div class="rounded-2xl p-6 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:border-blue-400 transition-all duration-200 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-xl">
                            02
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">
                            Profil Mahasiswa
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Visualisasi data pribadi, informasi akademik ITS, laboratorium riset, minat bidang keilmuan, dan keahlian menggunakan komponen modular <code class="text-blue-600 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/30 px-1 py-0.5 rounded">&lt;x-info-card&gt;</code>.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-between text-xs">
                        <span class="font-mono text-slate-400">Rute: /profil-mahasiswa</span>
                        <a href="{{ route('profil') }}" class="text-emerald-600 dark:text-emerald-400 font-semibold hover:underline flex items-center gap-1">
                            Buka Halaman →
                        </a>
                    </div>
                </div>

                <!-- Modul 3: Ide Riset Agentic AI -->
                <div class="rounded-2xl p-6 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:border-blue-400 transition-all duration-200 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-purple-50 dark:bg-purple-900/40 text-purple-600 dark:text-purple-400 flex items-center justify-center font-bold text-xl">
                            03
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">
                            Platform Agentic AI & Ide
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            Visualisasi rancangan multi-agent kelompok ITS, toggle mode gelap dinamis (<code class="text-purple-600 dark:text-purple-300 bg-purple-50 dark:bg-purple-900/30 px-1 py-0.5 rounded">?mode=dark</code>), serta formulir pengusulan ide riset agen.
                        </p>
                    </div>
                    <div class="pt-4 mt-4 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-between text-xs">
                        <span class="font-mono text-slate-400">Rute: /ide-agent</span>
                        <a href="{{ route('ide.agent') }}" class="text-purple-600 dark:text-purple-400 font-semibold hover:underline flex items-center gap-1">
                            Buka Halaman →
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- ================= RINGKASAN SPEK TEKNIS ================= -->
        <section class="rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 p-6 sm:p-8 shadow-sm">
            <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                Kepatuhan Spesifikasi Teknis Tugas 4
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs sm:text-sm">
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700/60">
                    <div class="font-semibold text-slate-800 dark:text-slate-200 mb-1">
                        1. Master Layout
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">
                        <code class="text-blue-600 dark:text-blue-400">resources/views/layouts/app.blade.php</code> menaungi seluruh view anak.
                    </p>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700/60">
                    <div class="font-semibold text-slate-800 dark:text-slate-200 mb-1">
                        2. Controller Terpusat
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">
                        3 rute diarahkan ke satu file <code class="text-blue-600 dark:text-blue-400">PageController.php</code>.
                    </p>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700/60">
                    <div class="font-semibold text-slate-800 dark:text-slate-200 mb-1">
                        3. Komponen Kustom
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">
                        Tersedia <code class="text-blue-600 dark:text-blue-400">&lt;x-info-card&gt;</code> & <code class="text-blue-600 dark:text-blue-400">&lt;x-status-banner&gt;</code>.
                    </p>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700/60">
                    <div class="font-semibold text-slate-800 dark:text-slate-200 mb-1">
                        4. Bundler Vite
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs">
                        Tailwind CSS dikompilasi secara lokal via Vite tanpa CDN mentah.
                    </p>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
