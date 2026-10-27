<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = [
            ['nama_obat' => 'Paracetamol 500 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 5000],
            ['nama_obat' => 'Paracetamol Sirup 120 mg/5 ml', 'kemasan' => 'Botol 60 ml', 'harga' => 12000],
            ['nama_obat' => 'Amoxicillin 500 mg', 'kemasan' => 'Strip 10 kapsul', 'harga' => 12000],
            ['nama_obat' => 'Ibuprofen 400 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 8000],
            ['nama_obat' => 'Asam Mefenamat 500 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 6000],
            ['nama_obat' => 'Antasida Doen', 'kemasan' => 'Strip 10 tablet kunyah', 'harga' => 4000],
            ['nama_obat' => 'CTM 4 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 3000],
            ['nama_obat' => 'Cetirizine 10 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 7000],
            ['nama_obat' => 'Ambroxol 30 mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 6000],
            ['nama_obat' => 'OBH Sirup', 'kemasan' => 'Botol 100 ml', 'harga' => 15000],
            ['nama_obat' => 'Vitamin C 500 mg', 'kemasan' => 'Botol 30 tablet', 'harga' => 15000],
            ['nama_obat' => 'Kloramfenikol Tetes Mata', 'kemasan' => 'Botol 5 ml', 'harga' => 25000],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
