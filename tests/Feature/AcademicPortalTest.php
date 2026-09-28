<?php

namespace Tests\Feature;

use Tests\TestCase;

class AcademicPortalTest extends TestCase
{
    /**
     * Uji Rute 1: Beranda dapat diakses dengan sukses.
     */
    public function test_halaman_beranda_dapat_diakses(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PORTAL AKADEMIK');
        $response->assertSee('Aziz Adi Pramana');
        $response->assertSee('Institut Teknologi Sepuluh Nopember');
    }

    /**
     * Uji Tantangan 2: Alert status interaktif dengan query param ?user=Andi
     */
    public function test_tantangan_2_alert_status_interaktif_dengan_parameter_user(): void
    {
        $response = $this->get('/beranda?user=Andi');
        $response->assertStatus(200);
        $response->assertSee('Halo, Selamat Datang Andi');
        $response->assertSee('Tantangan 2 Terpenuhi');
    }

    /**
     * Uji Rute 2: Halaman Profil Mahasiswa dengan komponen x-info-card.
     */
    public function test_halaman_profil_mahasiswa_dapat_diakses(): void
    {
        $response = $this->get('/profil-mahasiswa');
        $response->assertStatus(200);
        $response->assertSee('5025221001');
        $response->assertSee('Teknik Informatika');
        $response->assertSee('Lab Rekayasa Perangkat Lunak');
    }

    /**
     * Uji Rute 3: Halaman Ide Riset Agentic AI mode standar.
     */
    public function test_halaman_ide_agent_mode_terang(): void
    {
        $response = $this->get('/ide-agent');
        $response->assertStatus(200);
        $response->assertSee('CampusAgent');
        $response->assertSee('Formulir Pengumpulan Ide Riset Agentic AI');
    }

    /**
     * Uji Tantangan 1: Toggle tema gelap dinamis dengan parameter ?mode=dark
     */
    public function test_tantangan_1_toggle_mode_gelap_dengan_parameter_mode_dark(): void
    {
        $response = $this->get('/ide-agent?mode=dark');
        $response->assertStatus(200);
        $response->assertSee('Mode Gelap Aktif Berdasarkan Parameter Rute');
        $response->assertSee('Tantangan 1 Terpenuhi');
    }

    /**
     * Uji Pengiriman Formulir Ide Riset via POST /ide-agent
     */
    public function test_pengiriman_formulir_ide_riset_berhasil(): void
    {
        $response = $this->post('/ide-agent', [
            'nama_pengusul' => 'Tim Riset FTEIC',
            'email' => 'riset@student.its.ac.id',
            'judul_ide' => 'Autonomous Campus Energy Optimizer',
            'kategori_agent' => 'Data Analytics & Lab Assistant',
            'arsitektur_model' => 'DeepSeek R1 / Llama 3 (Ollama Lokal)',
            'deskripsi_ide' => 'Sistem multi-agent untuk memonitor efisiensi energi di gedung Departemen Teknik Informatika ITS.',
            'mode' => 'light'
        ]);

        $response->assertRedirect('/ide-agent?mode=light');
        $response->assertSessionHas('status_success');
    }
}
