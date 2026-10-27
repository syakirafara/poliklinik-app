<?php

namespace Database\Seeders;

use App\Models\JadwalPeriksa;
use App\Models\User;
use Illuminate\Database\Seeder;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokter = User::where('role', 'dokter')->pluck('id', 'email');

        $jadwals = [
            ['dokter' => 'dokter@gmail.com', 'hari' => 'Selasa', 'jam_mulai' => '08:00', 'jam_selesai' => '12:00'],
            ['dokter' => 'dokter@gmail.com', 'hari' => 'Kamis', 'jam_mulai' => '08:00', 'jam_selesai' => '12:00'],
            ['dokter' => 'andi@gmail.com', 'hari' => 'Senin', 'jam_mulai' => '08:00', 'jam_selesai' => '12:00'],
            ['dokter' => 'andi@gmail.com', 'hari' => 'Rabu', 'jam_mulai' => '13:00', 'jam_selesai' => '17:00'],
            ['dokter' => 'siti@gmail.com', 'hari' => 'Selasa', 'jam_mulai' => '08:00', 'jam_selesai' => '12:00'],
            ['dokter' => 'siti@gmail.com', 'hari' => 'Kamis', 'jam_mulai' => '13:00', 'jam_selesai' => '16:00'],
            ['dokter' => 'budi@gmail.com', 'hari' => 'Rabu', 'jam_mulai' => '08:00', 'jam_selesai' => '11:00'],
            ['dokter' => 'budi@gmail.com', 'hari' => 'Sabtu', 'jam_mulai' => '09:00', 'jam_selesai' => '12:00'],
            ['dokter' => 'rina@gmail.com', 'hari' => 'Jumat', 'jam_mulai' => '13:00', 'jam_selesai' => '16:00'],
        ];

        foreach ($jadwals as $jadwal) {
            JadwalPeriksa::create([
                'id_dokter' => $dokter[$jadwal['dokter']],
                'hari' => $jadwal['hari'],
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
            ]);
        }
    }
}
