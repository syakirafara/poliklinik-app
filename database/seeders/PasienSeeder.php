<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lengkapi data akun pasien bawaan dari UserSeeder
        User::where('email', 'pasien@gmail.com')->update([
            'alamat' => 'Jl. Imam Bonjol No. 5, Semarang',
            'no_ktp' => '3374050101000001',
            'no_hp' => '085712340000',
            'no_rm' => '202610-001',
        ]);

        $pasiens = [
            [
                'nama' => 'Ahmad Fauzi',
                'email' => 'ahmad@gmail.com',
                'alamat' => 'Jl. Kaligawe No. 12, Semarang',
                'no_ktp' => '3374051505950001',
                'no_hp' => '085712340001',
                'no_rm' => '202610-002',
            ],
            [
                'nama' => 'Dewi Lestari',
                'email' => 'dewi@gmail.com',
                'alamat' => 'Jl. Setiabudi No. 77, Semarang',
                'no_ktp' => '3374066208970002',
                'no_hp' => '085712340002',
                'no_rm' => '202610-003',
            ],
            [
                'nama' => 'Rizky Hidayat',
                'email' => 'rizky@gmail.com',
                'alamat' => 'Jl. Dr. Cipto No. 21, Semarang',
                'no_ktp' => '3374070910990003',
                'no_hp' => '085712340003',
                'no_rm' => '202610-004',
            ],
            [
                'nama' => 'Nur Aini',
                'email' => 'nuraini@gmail.com',
                'alamat' => 'Jl. Ngesrep Timur No. 9, Semarang',
                'no_ktp' => '3374084403930004',
                'no_hp' => '085712340004',
                'no_rm' => '202610-005',
            ],
            [
                'nama' => 'Bayu Saputra',
                'email' => 'bayu@gmail.com',
                'alamat' => 'Jl. Kedungmundu No. 56, Semarang',
                'no_ktp' => '3374092011010005',
                'no_hp' => '085712340005',
                'no_rm' => '202610-006',
            ],
        ];

        $password = Hash::make('pasien');

        foreach ($pasiens as $pasien) {
            User::create([
                ...$pasien,
                'password' => $password,
                'role' => 'pasien',
            ]);
        }
    }
}
