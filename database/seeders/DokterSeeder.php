<?php

namespace Database\Seeders;

use App\Models\Poli;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poli = Poli::pluck('id', 'nama_poli');

        // Lengkapi data akun dokter bawaan dari UserSeeder
        User::where('email', 'dokter@gmail.com')->update([
            'alamat' => 'Jl. Pemuda No. 10, Semarang',
            'no_ktp' => '3374010101800001',
            'no_hp' => '081234560000',
            'id_poli' => $poli['Poli Umum'],
        ]);

        $dokters = [
            [
                'nama' => 'dr. Andi Pratama',
                'email' => 'andi@gmail.com',
                'alamat' => 'Jl. Pandanaran No. 88, Semarang',
                'no_ktp' => '3374011203850001',
                'no_hp' => '081234560001',
                'id_poli' => $poli['Poli Umum'],
            ],
            [
                'nama' => 'drg. Siti Rahmawati',
                'email' => 'siti@gmail.com',
                'alamat' => 'Jl. Gajah Mada No. 45, Semarang',
                'no_ktp' => '3374024508880002',
                'no_hp' => '081234560002',
                'id_poli' => $poli['Poli Gigi'],
            ],
            [
                'nama' => 'dr. Budi Santoso, Sp.A',
                'email' => 'budi@gmail.com',
                'alamat' => 'Jl. Majapahit No. 120, Semarang',
                'no_ktp' => '3374031707800003',
                'no_hp' => '081234560003',
                'id_poli' => $poli['Poli Anak'],
            ],
            [
                'nama' => 'dr. Rina Kartika, Sp.M',
                'email' => 'rina@gmail.com',
                'alamat' => 'Jl. Sriwijaya No. 30, Semarang',
                'no_ktp' => '3374046302870004',
                'no_hp' => '081234560004',
                'id_poli' => $poli['Poli Mata'],
            ],
        ];

        $password = Hash::make('dokter');

        foreach ($dokters as $dokter) {
            User::create([
                ...$dokter,
                'password' => $password,
                'role' => 'dokter',
            ]);
        }
    }
}
