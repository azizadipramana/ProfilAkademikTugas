@extends('layouts.app')

@section('title', 'Profil Mahasiswa - Aziz Adi Pramana | ITS')

@section('content')
<div class="relative overflow-hidden py-8 sm:py-12">

    <!-- Background accents -->
    <div class="absolute inset-0 bg-grid-pattern opacity-40 pointer-events-none"></div>
    <div class="absolute top-10 right-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">

        <!-- ================= HEADER PROFIL MAHASISWA ================= -->
        <section class="rounded-3xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm p-6 sm:p-8 relative overflow-hidden">
            <!-- Background Banner Gradient -->
            <div class="h-32 sm:h-40 -mx-6 -mt-6 sm:-mx-8 sm:-mt-8 bg-gradient-to-r from-[#013880] via-[#0052b4] to-[#00b4d8] relative">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="absolute top-4 right-4 sm:top-6 sm:right-6">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm border border-white/20">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Mahasiswa Aktif Semester Genap
                    </span>
                </div>
            </div>

            <!-- Profile Info Bar -->
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6 -mt-16 sm:-mt-14 relative z-10">
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-5">
                    <!-- Avatar / Inisial Foto -->
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-gradient-to-br from-slate-900 to-[#013880] p-1.5 shadow-xl ring-4 ring-white dark:ring-slate-800 shrink-0">
                        <div class="w-full h-full rounded-xl bg-[#013880] flex items-center justify-center text-white font-extrabold text-3xl tracking-wider">
                            AP
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-slate-900 dark:text-white">
                                {{ $profil['nama'] }}
                            </h1>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-[#013880] dark:bg-blue-900/50 dark:text-blue-300">
                                Angkatan 2022
                            </span>
                        </div>
                        <p class="text-sm font-medium text-slate-600 dark:text-slate-300">
                            {{ $profil['nrp'] }} • {{ $profil['departemen'] }}
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $profil['fakultas'] }}, {{ $profil['universitas'] }}
                        </p>
                    </div>
                </div>

                <!-- Kontak Cepat -->
                <div class="flex items-center gap-2 pt-2 sm:pt-0">
                    <a href="mailto:5025221001@student.its.ac.id" 
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Email Mahasiswa ITS</span>
                    </a>
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span>GitHub</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- ================= IMPLEMENTASI KOMPONEN REUSABLE INFO CARD ================= -->
        <section class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        Data Akademik & Riset Mahasiswa
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                        Dirender menggunakan komponen reusable <code class="text-blue-600 dark:text-blue-400">&lt;x-info-card&gt;</code> sesuai spesifikasi teknis Tugas 4.
                    </p>
                </div>
            </div>

            <!-- Grid Komponen Info-Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                <!-- Card 1: NRP Mahasiswa -->
                <x-info-card 
                    title="Nomor Registrasi Pokok (NRP)"
                    :value="$profil['nrp']"
                    icon="nrp"
                    badge="Terdaftar Aktif"
                    badgeColor="green"
                    :highlight="true"
                >
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Mahasiswa Program Sarjana (S1) Angkatan 2022 Departemen Teknik Informatika ITS.
                    </p>
                </x-info-card>

                <!-- Card 2: Departemen & Fakultas -->
                <x-info-card 
                    title="Departemen & Fakultas"
                    :value="$profil['departemen']"
                    icon="building"
                    badge="FTEIC"
                    badgeColor="blue"
                >
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Fakultas Teknologi Elektro dan Informatika Cerdas, Institut Teknologi Sepuluh Nopember Surabaya.
                    </p>
                </x-info-card>

                <!-- Card 3: Prestasi Akademik IPK -->
                <x-info-card 
                    title="Prestasi Akademik (IPK)"
                    :value="$profil['ipk'] . ' / 4.00'"
                    icon="star"
                    badge="Sangat Memuaskan"
                    badgeColor="gold"
                >
                    <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden mt-1 mb-1.5">
                        <div class="bg-gradient-to-r from-amber-400 to-amber-500 h-full rounded-full" style="width: 97%;"></div>
                    </div>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400">
                        Total 114 SKS telah diselesaikan hingga semester 5.
                    </span>
                </x-info-card>

                <!-- Card 4: Laboratorium Riset -->
                <x-info-card 
                    title="Laboratorium Riset"
                    value="Lab Rekayasa Perangkat Lunak"
                    icon="lab"
                    badge="Fokus Riset"
                    badgeColor="purple"
                >
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Terlibat dalam penelitian arsitektur microservices, framework full-stack web, dan sistem AI otonom.
                    </p>
                </x-info-card>

                <!-- Card 5: Mata Kuliah Terkait -->
                <x-info-card 
                    title="Mata Kuliah Utama"
                    value="Pemrograman Berbasis Kerangka Kerja"
                    icon="code"
                    badge="Semester Genap"
                    badgeColor="cyan"
                >
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Mempelajari arsitektur Laravel MVC, Blade templating, Vite asset bundling, routing, dan integrasi API.
                    </p>
                </x-info-card>

                <!-- Card 6: Fokus Platform Agentic AI -->
                <x-info-card 
                    title="Tugas Besar / Capstone"
                    value="Platform Multi-Agentic AI"
                    icon="brain"
                    badge="Kelompok 3"
                    badgeColor="green"
                >
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Merancang platform kolaboratif agen otonom untuk asisten penelitian akademik mahasiswa ITS.
                    </p>
                </x-info-card>

            </div>
        </section>

        <!-- ================= DETAIL MINAT RISET & SKILLSET ================= -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Minat Riset Akademik -->
            <div class="rounded-2xl p-6 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="text-blue-600 dark:text-blue-400">🎯</span>
                        Minat Riset & Bidang Keilmuan
                    </h3>
                    <span class="text-xs text-slate-400">Rencana Skripsi / TA</span>
                </div>

                <div class="space-y-2.5">
                    @foreach($profil['minat_riset'] as $minat)
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50">
                            <span class="w-5 h-5 rounded-md bg-blue-100 dark:bg-blue-900/60 text-blue-600 dark:text-blue-300 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">
                                ✓
                            </span>
                            <div>
                                <h4 class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">
                                    {{ $minat }}
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tech Stack & Keahlian -->
            <div class="rounded-2xl p-6 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="text-emerald-600 dark:text-emerald-400">⚡</span>
                        Keahlian & Penguasaan Teknologi
                    </h3>
                    <span class="text-xs text-slate-400">Tech Stack</span>
                </div>

                <div class="space-y-3">
                    @foreach($profil['keahlian'] as $skill)
                        <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span class="text-xs sm:text-sm font-semibold text-slate-800 dark:text-slate-200">
                                    {{ $skill['nama'] }}
                                </span>
                            </div>
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                                {{ $skill['level'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- ================= CALL TO ACTION KE RANCANGAN AGENT ================= -->
        <div class="rounded-2xl bg-gradient-to-r from-blue-900 via-[#013880] to-indigo-900 text-white p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-md">
            <div class="space-y-1.5 text-center sm:text-left">
                <h3 class="text-lg font-bold">
                    Tertarik dengan rancangan platform Agentic AI kelompok kami?
                </h3>
                <p class="text-xs sm:text-sm text-slate-300 max-w-xl">
                    Jelajahi visualisasi arsitektur multi-agent, alur kerja otonom, serta sampaikan ide riset baru pada modul ide riset.
                </p>
            </div>
            <a href="{{ route('ide.agent') }}" 
               class="px-5 py-2.5 rounded-xl font-semibold text-xs sm:text-sm bg-white text-[#013880] hover:bg-slate-100 transition-colors shrink-0 shadow-sm flex items-center gap-2">
                <span>Buka Rancangan Agentic AI</span>
                <span>→</span>
            </a>
        </div>

    </div>
</div>
@endsection
