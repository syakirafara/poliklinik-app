<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            ['nama_poli' => 'Poli Umum', 'keterangan' => 'Pemeriksaan kesehatan umum untuk segala usia'],
            ['nama_poli' => 'Poli Gigi', 'keterangan' => 'Pemeriksaan dan perawatan kesehatan gigi dan mulut'],
            ['nama_poli' => 'Poli Anak', 'keterangan' => 'Pemeriksaan kesehatan bayi dan anak'],
            ['nama_poli' => 'Poli Mata', 'keterangan' => 'Pemeriksaan kesehatan dan gangguan penglihatan'],
        ];

        foreach ($polis as $poli) {
            Poli::create($poli);
        }
    }
}
