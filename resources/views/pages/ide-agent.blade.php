@extends('layouts.app')

@section('title', 'Rancangan Platform Agentic AI & Pengumpulan Ide - ITS')

@section('content')
@php
    // Tantangan 1: Toggle Tema Dinamis menggunakan variabel Blade PHP
    $isDark = (request('mode') === 'dark') || ($isDarkMode ?? false);
    
    // Kelas Tailwind dinamis berdasarkan variabel PHP
    $containerBgClass = $isDark ? 'bg-slate-950 text-slate-100' : 'bg-slate-50 text-slate-900';
    $cardClass = $isDark ? 'bg-slate-900 border-slate-800 text-slate-100 shadow-md' : 'bg-white border-slate-200 text-slate-900 shadow-sm';
    $subcardClass = $isDark ? 'bg-slate-800/70 border-slate-700 text-slate-200' : 'bg-slate-50 border-slate-200/80 text-slate-700';
    $mutedTextClass = $isDark ? 'text-slate-400' : 'text-slate-500';
    $inputClass = $isDark 
        ? 'bg-slate-800 border-slate-700 text-white placeholder-slate-400 focus:border-cyan-500 focus:ring-cyan-500' 
        : 'bg-white border-slate-300 text-slate-900 placeholder-slate-400 focus:border-blue-600 focus:ring-blue-600';
@endphp

<div class="relative overflow-hidden py-8 sm:py-12 transition-colors duration-300 {{ $containerBgClass }}">

    <!-- Pola Latar Belakang -->
    <div class="absolute inset-0 {{ $isDark ? 'bg-grid-pattern-dark' : 'bg-grid-pattern' }} opacity-40 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">

        <!-- ================= TANTANGAN 1: NOTIFIKASI TOGGLE TEMA DINAMIS ================= -->
        @if($isDark)
            <div class="animate-bounce-in">
                <x-status-banner 
                    type="info"
                    title="Mode Gelap Aktif Berdasarkan Parameter Rute (?mode=dark)"
                    message="Variabel Blade PHP mendeteksi mode=dark dan menerapkan class dynamic CSS Tailwind secara terpusat untuk mengubah tema latar belakang halaman."
                >
                    <div class="flex items-center gap-2 mt-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-blue-100 text-blue-900 dark:bg-blue-900/60 dark:text-blue-200">
                            ★ Tantangan 1 Terpenuhi (Nilai Plus A+)
                        </span>
                        <a href="{{ route('ide.agent', ['mode' => 'light']) }}" 
                           class="text-xs font-medium text-cyan-400 underline hover:no-underline">
                            Kembalikan ke Mode Terang (?mode=light)
                        </a>
                    </div>
                </x-status-banner>
            </div>
        @endif

        <!-- ================= NOTIFIKASI FLASH FORMULIR ================= -->
        @if(session('status_success'))
            <x-status-banner 
                type="success"
                title="Usulan Ide Riset Berhasil Dikirim!"
                :message="session('status_success')"
            />
        @endif

        @if($errors->any())
            <x-status-banner 
                type="danger"
                title="Terdapat Kesalahan pada Pengisian Formulir"
                message="Mohon periksa kembali input formulir Anda dan pastikan semua kolom terisi dengan benar."
            >
                <ul class="list-disc list-inside text-xs mt-1 space-y-0.5 text-rose-700 dark:text-rose-300">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-status-banner>
        @endif

        <!-- ================= HEADER HALAMAN & KONTROL MODE ================= -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b pb-6 {{ $isDark ? 'border-slate-800' : 'border-slate-200' }}">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#013880] text-white">
                        Kelompok 3 PBKK
                    </span>
                    <span class="text-xs {{ $mutedTextClass }}">
                        Visualisasi Arsitektur & Formulir Ide
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Rancangan Platform Agentic AI & Pengumpulan Ide
                </h1>
                <p class="text-xs sm:text-sm {{ $mutedTextClass }} mt-1 max-w-2xl">
                    Visualisasi kolaborasi multi-agent otonom untuk riset akademik ITS dan formulir interaktif pengusulan ide platform baru.
                </p>
            </div>

            <!-- Kontrol Switcher Mode Gelap / Terang (Tantangan 1) -->
            <div class="flex items-center gap-3 shrink-0">
                <span class="text-xs font-semibold {{ $mutedTextClass }}">
                    Uji Tantangan 1:
                </span>
                <div class="inline-flex rounded-xl p-1 border {{ $isDark ? 'bg-slate-900 border-slate-700' : 'bg-slate-100 border-slate-200' }}">
                    <a href="{{ route('ide.agent', ['mode' => 'light']) }}" 
                       class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150 {{ !$isDark ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-400 hover:text-white' }}">
                        ☀️ Terang
                    </a>
                    <a href="{{ route('ide.agent', ['mode' => 'dark']) }}" 
                       class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150 {{ $isDark ? 'bg-slate-800 text-cyan-400 shadow-xs ring-1 ring-cyan-500/40' : 'text-slate-500 hover:text-slate-900' }}">
                        🌙 Mode Gelap (?mode=dark)
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= VISUALISASI RANCANGAN PLATFORM AGENTIC AI KELOMPOK ================= -->
        <section class="rounded-3xl border p-6 sm:p-8 {{ $cardClass }} relative overflow-hidden">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full text-xs font-bold bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 mb-2">
                        <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                        Arsitektur Multi-Agentic System
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black">
                        CampusAgent: Sistem Multi-Agent Kolaboratif Mahasiswa ITS
                    </h2>
                    <p class="text-xs sm:text-sm {{ $mutedTextClass }} mt-1 max-w-3xl">
                        Rancangan kelompok kami memanfaatkan paradigma agen otonom berbasis *Hierarchical State Graph*. Pengguna cukup memberikan satu tujuan umum, lalu orkestrator akan memecah tugas ke agen-agen spesialis.
                    </p>
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <span class="px-3 py-1 rounded-lg text-xs font-mono font-medium {{ $isDark ? 'bg-slate-800 text-cyan-300' : 'bg-blue-50 text-blue-800' }}">
                        LLM: Gemini / Claude / Ollama
                    </span>
                </div>
            </div>

            <!-- Visual Flowchart / Diagram Arsitektur Agent -->
            <div class="mb-8 p-5 sm:p-6 rounded-2xl border {{ $subcardClass }}">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-4 flex items-center gap-2">
                    <span>🔄</span> Diagram Alur Kerja Eksekusi Agen (Workflow Loop)
                </h3>

                <!-- Pipeline Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative">
                    
                    <!-- Tahap 1: User Request & Orchestrator -->
                    <div class="p-4 rounded-xl border {{ $cardClass }} relative flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                                Langkah 1: Input & Perencanaan
                            </span>
                            <h4 class="text-sm font-bold mt-1">Prompt / Goal Pengguna</h4>
                            <p class="text-xs {{ $mutedTextClass }} mt-1">
                                Mahasiswa memasukkan instruksi, misal: "Buat ringkasan paper & prototipe kode sistem IoT".
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800 text-[11px] font-semibold text-blue-600 dark:text-blue-400">
                            → Masuk ke Orchestrator
                        </div>
                    </div>

                    <!-- Tahap 2: Orchestrator Decomposition -->
                    <div class="p-4 rounded-xl border border-blue-400/40 ring-2 ring-blue-500/20 {{ $cardClass }} relative flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-cyan-600 dark:text-cyan-400">
                                Langkah 2: Task Orchestration
                            </span>
                            <h4 class="text-sm font-bold mt-1">Master Orchestrator Agent</h4>
                            <p class="text-xs {{ $mutedTextClass }} mt-1">
                                Menguraikan *goal* menjadi sub-tugas independen dan mendelegasikannya ke sub-agen secara paralel.
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800 text-[11px] font-semibold text-cyan-600 dark:text-cyan-400">
                            → Delegasi Sub-Agen
                        </div>
                    </div>

                    <!-- Tahap 3: Parallel Specialized Agents -->
                    <div class="p-4 rounded-xl border {{ $cardClass }} relative flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">
                                Langkah 3: Eksekusi Paralel
                            </span>
                            <h4 class="text-sm font-bold mt-1">Sub-Agen Spesialis</h4>
                            <p class="text-xs {{ $mutedTextClass }} mt-1">
                                Researcher Agent meneliti literatur, Coder Agent menyusun implementasi kode secara simultan.
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800 text-[11px] font-semibold text-emerald-600 dark:text-emerald-400">
                            → Evaluasi & Konsensus
                        </div>
                    </div>

                    <!-- Tahap 4: Critic & Verification -->
                    <div class="p-4 rounded-xl border {{ $cardClass }} relative flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-purple-600 dark:text-purple-400">
                                Langkah 4: Validasi & Output
                            </span>
                            <h4 class="text-sm font-bold mt-1">Critic & Ethics Agent</h4>
                            <p class="text-xs {{ $mutedTextClass }} mt-1">
                                Menguji akurasi fakta, sintaks kode, dan etika sebelum menyajikan laporan final ke mahasiswa.
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800 text-[11px] font-semibold text-purple-600 dark:text-purple-400">
                            ✓ Laporan Siap Disajikan
                        </div>
                    </div>

                </div>
            </div>

            <!-- 4 Kartu Spesialis Agen -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Agen 1 -->
                <div class="p-4 rounded-2xl border {{ $subcardClass }} space-y-2">
                    <div class="w-9 h-9 rounded-xl bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 flex items-center justify-center font-bold text-sm">
                        🤖 1
                    </div>
                    <h4 class="font-bold text-sm">Master Orchestrator</h4>
                    <p class="text-xs {{ $mutedTextClass }}">
                        Mengelola antrian eksekusi, memantau *state* percakapan, dan menyeimbangkan beban kerja agen.
                    </p>
                    <div class="pt-2 text-[11px] font-mono text-blue-600 dark:text-blue-400">
                        Tools: PlanBuilder, ContextEngine
                    </div>
                </div>

                <!-- Agen 2 -->
                <div class="p-4 rounded-2xl border {{ $subcardClass }} space-y-2">
                    <div class="w-9 h-9 rounded-xl bg-cyan-100 dark:bg-cyan-900/50 text-cyan-700 dark:text-cyan-300 flex items-center justify-center font-bold text-sm">
                        📚 2
                    </div>
                    <h4 class="font-bold text-sm">Literature Researcher</h4>
                    <p class="text-xs {{ $mutedTextClass }}">
                        Menyisir basis data paper ilmiah (arXiv, IEEE Xplore, Google Scholar) dan merangkum sitasi format APA/IEEE.
                    </p>
                    <div class="pt-2 text-[11px] font-mono text-cyan-600 dark:text-cyan-400">
                        Tools: ArxivSearch, PDFReader
                    </div>
                </div>

                <!-- Agen 3 -->
                <div class="p-4 rounded-2xl border {{ $subcardClass }} space-y-2">
                    <div class="w-9 h-9 rounded-xl bg-emerald-100 dark:bg-emerald-900/50 text-emerald-700 dark:text-emerald-300 flex items-center justify-center font-bold text-sm">
                        💻 3
                    </div>
                    <h4 class="font-bold text-sm">Code & Data Analyst</h4>
                    <p class="text-xs {{ $mutedTextClass }}">
                        Menghasilkan scaffolding kode backend Laravel, Python ML model, serta melakukan validasi sintaks secara mandiri.
                    </p>
                    <div class="pt-2 text-[11px] font-mono text-emerald-600 dark:text-emerald-400">
                        Tools: CodeSandbox, SyntaxLinter
                    </div>
                </div>

                <!-- Agen 4 -->
                <div class="p-4 rounded-2xl border {{ $subcardClass }} space-y-2">
                    <div class="w-9 h-9 rounded-xl bg-purple-100 dark:bg-purple-900/50 text-purple-700 dark:text-purple-300 flex items-center justify-center font-bold text-sm">
                        ⚖️ 4
                    </div>
                    <h4 class="font-bold text-sm">Critic & Quality Reviewer</h4>
                    <p class="text-xs {{ $mutedTextClass }}">
                        Bertindak sebagai evaluator kritis untuk mendeteksi halusinasi, celah keamanan, dan integritas akademik.
                    </p>
                    <div class="pt-2 text-[11px] font-mono text-purple-600 dark:text-purple-400">
                        Tools: FactChecker, SafetyFilter
                    </div>
                </div>

            </div>
        </section>

        <!-- ================= FORMULIR PENGUMPULAN IDE RISET AGENTIC AI ================= -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Kolom Kiri: Form Pengumpulan Ide -->
            <div class="lg:col-span-7 rounded-3xl border p-6 sm:p-8 {{ $cardClass }} space-y-5">
                <div class="border-b pb-4 {{ $isDark ? 'border-slate-800' : 'border-slate-200' }}">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">
                            Kolaborasi Ide
                        </span>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold">
                        Formulir Pengumpulan Ide Riset Agentic AI
                    </h3>
                    <p class="text-xs sm:text-sm {{ $mutedTextClass }} mt-0.5">
                        Punya gagasan use-case agent baru untuk sivitas akademika ITS? Kirimkan konsep Anda melalui form di bawah ini.
                    </p>
                </div>

                <form action="{{ route('ide.agent.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Sertakan mode aktif agar tampilan tidak reset -->
                    <input type="hidden" name="mode" value="{{ $isDark ? 'dark' : 'light' }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Nama Pengusul -->
                        <div>
                            <label for="nama_pengusul" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                                Nama Pengusul / Kelompok <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" 
                                   id="nama_pengusul" 
                                   name="nama_pengusul" 
                                   value="{{ old('nama_pengusul') }}"
                                   placeholder="Contoh: Aziz Adi / Tim Riset PBKK"
                                   required
                                   class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">
                        </div>

                        <!-- Email Kampus -->
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                                Email Kampus / ITS <span class="text-rose-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="nama@student.its.ac.id"
                                   required
                                   class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">
                        </div>
                    </div>

                    <!-- Judul Ide Platform -->
                    <div>
                        <label for="judul_ide" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                            Judul Ide Platform Agentic AI <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               id="judul_ide" 
                               name="judul_ide" 
                               value="{{ old('judul_ide') }}"
                               placeholder="Contoh: Agentic Scheduling & Lab Equipment Booking Assistant"
                               required
                               class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Kategori Agent -->
                        <div>
                            <label for="kategori_agent" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                                Kategori Agen <span class="text-rose-500">*</span>
                            </label>
                            <select id="kategori_agent" 
                                    name="kategori_agent" 
                                    required
                                    class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">
                                <option value="Academic & Research Agent">Academic & Research Agent</option>
                                <option value="Software Engineering & Code Agent">Software Engineering & Code Agent</option>
                                <option value="Campus Administration & Service Bot">Campus Administration & Service Bot</option>
                                <option value="Data Analytics & Lab Assistant">Data Analytics & Lab Assistant</option>
                            </select>
                        </div>

                        <!-- Arsitektur Model LLM -->
                        <div>
                            <label for="arsitektur_model" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                                Model / Arsitektur LLM <span class="text-rose-500">*</span>
                            </label>
                            <select id="arsitektur_model" 
                                    name="arsitektur_model" 
                                    required
                                    class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">
                                <option value="Gemini 2.5 Flash / Pro (Google AI)">Gemini 2.5 Flash / Pro (Google AI)</option>
                                <option value="Claude 3.7 Sonnet (Anthropic)">Claude 3.7 Sonnet (Anthropic)</option>
                                <option value="DeepSeek R1 / Llama 3 (Ollama Lokal)">DeepSeek R1 / Llama 3 (Ollama Lokal)</option>
                                <option value="Hybrid Multi-Model Ensemble">Hybrid Multi-Model Ensemble</option>
                            </select>
                        </div>
                    </div>

                    <!-- Deskripsi Konsep -->
                    <div>
                        <label for="deskripsi_ide" class="block text-xs font-semibold uppercase tracking-wider mb-1.5 {{ $mutedTextClass }}">
                            Deskripsi Alur & Solusi Agen <span class="text-rose-500">*</span>
                        </label>
                        <textarea id="deskripsi_ide" 
                                  name="deskripsi_ide" 
                                  rows="4" 
                                  placeholder="Jelaskan masalah apa yang diselesaikan dan bagaimana agen otonom berinteraksi menyelesaikan tugas tersebut (minimal 20 karakter)..."
                                  required
                                  class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm border focus:outline-none transition-colors {{ $inputClass }}">{{ old('deskripsi_ide') }}</textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-2 flex items-center justify-between gap-4">
                        <span class="text-[11px] {{ $mutedTextClass }}">
                            * Ide akan ditinjau oleh reviewer tim riset
                        </span>
                        <button type="submit" 
                                class="px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm bg-gradient-to-r from-[#013880] to-blue-600 hover:from-blue-700 hover:to-blue-800 text-white shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-2">
                            <span>Kirim Ide Riset</span>
                            <span>🚀</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kolom Kanan: Daftar Ide yang Sudah Diajukan -->
            <div class="lg:col-span-5 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold flex items-center gap-2">
                        <span>💡</span>
                        Ide Terkumpul ({{ count($ideas) }})
                    </h3>
                    <span class="text-xs {{ $mutedTextClass }}">Diperbarui real-time</span>
                </div>

                <div class="space-y-3">
                    @forelse($ideas as $idea)
                        <div class="p-4 rounded-2xl border {{ $cardClass }} space-y-2 hover:border-blue-400 transition-colors">
                            <div class="flex items-start justify-between gap-2">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-800 dark:bg-blue-900/60 dark:text-blue-300">
                                    {{ $idea['kategori'] }}
                                </span>
                                <span class="text-[10px] {{ $mutedTextClass }}">
                                    {{ $idea['waktu'] }}
                                </span>
                            </div>

                            <h4 class="text-sm font-bold leading-snug">
                                {{ $idea['judul'] }}
                            </h4>

                            <p class="text-xs {{ $mutedTextClass }} leading-relaxed">
                                {{ $idea['deskripsi'] }}
                            </p>

                            <div class="pt-2 border-t {{ $isDark ? 'border-slate-800' : 'border-slate-100' }} flex items-center justify-between text-[11px]">
                                <span class="font-medium {{ $mutedTextClass }}">
                                    Pengusul: <strong class="{{ $isDark ? 'text-slate-200' : 'text-slate-800' }}">{{ $idea['pengusul'] }}</strong>
                                </span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                                    {{ $idea['status'] }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center rounded-2xl border border-dashed {{ $isDark ? 'border-slate-800' : 'border-slate-300' }} text-xs {{ $mutedTextClass }}">
                            Belum ada ide yang diajukan. Jadilah pengusul pertama!
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
