<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Beranda (Home)
     * Menangani rute '/' dan '/beranda'
     * Mendukung Tantangan 2: Alert Status Interaktif via query param '?user=Nama'
     */
    public function home(Request $request)
    {
        $userName = $request->query('user');
        
        return view('pages.beranda', [
            'title' => 'Beranda - Profil Akademik & Platform Agentic AI ITS',
            'user' => $userName,
            'stats' => [
                'sks' => 18,
                'proyek' => 4,
                'agent_aktif' => 5,
                'semester' => 'Genap 2025/2026',
            ]
        ]);
    }

    /**
     * Halaman Profil Mahasiswa
     * Menangani rute '/profil-mahasiswa'
     * Menggunakan komponen reusable <x-info-card>
     */
    public function profil()
    {
        $profil = [
            'nama' => 'Aziz Adi Pramana',
            'nrp' => '5025221001',
            'departemen' => 'Teknik Informatika',
            'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)',
            'universitas' => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'semester' => 6,
            'ipk' => '3.88',
            'laboratorium' => 'Lab Rekayasa Perangkat Lunak & Sistem Cerdas',
            'minat_riset' => [
                'Autonomous Agentic AI Workflow',
                'Framework Web Modern (Laravel & Next.js)',
                'Large Language Model Orchestration',
                'Human-in-the-Loop AI Systems'
            ],
            'keahlian' => [
                ['nama' => 'PHP & Laravel', 'level' => 'Advanced'],
                ['nama' => 'Tailwind CSS & Vite', 'level' => 'Advanced'],
                ['nama' => 'Python & PyTorch/LangChain', 'level' => 'Intermediate'],
                ['nama' => 'Database (MySQL, PostgreSQL, SQLite)', 'level' => 'Advanced'],
                ['nama' => 'Git & CI/CD Workflow', 'level' => 'Intermediate'],
            ]
        ];

        return view('pages.profil', [
            'title' => 'Profil Mahasiswa - Aziz Adi Pramana | ITS',
            'profil' => $profil
        ]);
    }

    /**
     * Halaman Ide-Riset Agentic AI
     * Menangani rute '/ide-agent'
     * Mendukung Tantangan 1: Toggle Tema Dinamis via query param '?mode=dark'
     */
    public function ideAgent(Request $request)
    {
        $mode = $request->query('mode', 'light');
        $isDarkMode = ($mode === 'dark');

        // Mengambil ide yang baru disubmit dari session atau list ide default
        $submittedIdeas = session('submitted_ideas', [
            [
                'pengusul' => 'Kelompok 3 PBKK',
                'judul' => 'CampusAgent: Multi-Agent Collaborative Research Assistant for ITS Students',
                'kategori' => 'Academic & Research Agent',
                'arsitektur' => 'LangGraph + Ollama / Gemini API',
                'deskripsi' => 'Platform agen cerdas yang mengorkestrasikan agen pencari pustaka, agen perumus sitasi, dan agen verifikator plagiasi secara otonom.',
                'waktu' => '2 hari yang lalu',
                'status' => 'Disetujui Dosen Pembimbing'
            ],
            [
                'pengusul' => 'Aziz Adi Pramana',
                'judul' => 'CodeReviewer-Agent: Automated Pull-Request Quality Assessor',
                'kategori' => 'Software Engineering Agent',
                'arsitektur' => 'Claude 3.7 + GitHub Webhooks',
                'deskripsi' => 'Agen otomatis yang menganalisis keamanan kode, linting, serta kesesuaian arsitektur framework Laravel sebelum merge ke main branch.',
                'waktu' => 'Kemarin',
                'status' => 'Dalam Tahap Prototyping'
            ]
        ]);

        return view('pages.ide-agent', [
            'title' => 'Rancangan Platform Agentic AI & Pengumpulan Ide - ITS',
            'isDarkMode' => $isDarkMode,
            'currentMode' => $mode,
            'ideas' => $submittedIdeas
        ]);
    }

    /**
     * Penanganan submit formulir ide riset
     */
    public function storeIdea(Request $request)
    {
        $validated = $request->validate([
            'nama_pengusul' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'judul_ide' => 'required|string|max:200',
            'kategori_agent' => 'required|string',
            'arsitektur_model' => 'required|string',
            'deskripsi_ide' => 'required|string|min:20',
        ], [
            'nama_pengusul.required' => 'Nama pengusul wajib diisi.',
            'email.required' => 'Email ITS/kampus wajib disertakan.',
            'judul_ide.required' => 'Judul ide platform agentic AI harus diisi.',
            'deskripsi_ide.min' => 'Deskripsi ide minimal 20 karakter untuk kejelasan konsep.',
        ]);

        $ideas = session('submitted_ideas', []);
        
        $newIdea = [
            'pengusul' => $validated['nama_pengusul'],
            'judul' => $validated['judul_ide'],
            'kategori' => $validated['kategori_agent'],
            'arsitektur' => $validated['arsitektur_model'],
            'deskripsi' => $validated['deskripsi_ide'],
            'waktu' => 'Baru saja',
            'status' => 'Menunggu Review Reviewer'
        ];

        array_unshift($ideas, $newIdea);
        session(['submitted_ideas' => $ideas]);

        // Pertahankan query mode bila ada
        $mode = $request->input('mode', 'light');

        return redirect()->route('ide.agent', ['mode' => $mode])
            ->with('status_success', 'Ide riset platform Agentic AI "' . $validated['judul_ide'] . '" berhasil diajukan dan disimpan!');
    }
}
