<?php

namespace Database\Seeders;

use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Mengisi tabel daftar_poli, periksa, dan detail_periksa sekaligus,
 * karena ketiganya saling bergantung (pendaftaran -> pemeriksaan -> resep obat).
 */
class PemeriksaanSeeder extends Seeder
{
    private const BIAYA_JASA_DOKTER = 150000;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendaftarans = [
            // Sudah diperiksa
            [
                'pasien' => 'pasien@gmail.com',
                'dokter' => 'dokter@gmail.com',
                'hari' => 'Selasa',
                'keluhan' => 'Sakit kepala dan badan pegal-pegal',
                'no_antrian' => 1,
                'periksa' => [
                    'tgl_periksa' => '2026-10-13 08:30:00',
                    'catatan' => 'Kelelahan dan kurang tidur. Istirahat cukup dan perbanyak minum air putih.',
                    'obat' => ['Paracetamol 500 mg', 'Vitamin C 500 mg'],
                ],
            ],
            [
                'pasien' => 'ahmad@gmail.com',
                'dokter' => 'andi@gmail.com',
                'hari' => 'Senin',
                'keluhan' => 'Demam dan pusing sejak 2 hari yang lalu',
                'no_antrian' => 1,
                'periksa' => [
                    'tgl_periksa' => '2026-10-19 08:15:00',
                    'catatan' => 'Demam akibat infeksi virus. Istirahat cukup dan perbanyak minum air putih.',
                    'obat' => ['Paracetamol 500 mg'],
                ],
            ],
            [
                'pasien' => 'dewi@gmail.com',
                'dokter' => 'andi@gmail.com',
                'hari' => 'Senin',
                'keluhan' => 'Batuk berdahak dan pilek sejak 4 hari',
                'no_antrian' => 2,
                'periksa' => [
                    'tgl_periksa' => '2026-10-19 08:40:00',
                    'catatan' => 'ISPA ringan. Hindari minuman dingin dan gorengan.',
                    'obat' => ['Ambroxol 30 mg', 'Cetirizine 10 mg'],
                ],
            ],
            [
                'pasien' => 'rizky@gmail.com',
                'dokter' => 'siti@gmail.com',
                'hari' => 'Selasa',
                'keluhan' => 'Gigi geraham kanan bawah berlubang dan terasa nyeri',
                'no_antrian' => 1,
                'periksa' => [
                    'tgl_periksa' => '2026-10-13 09:00:00',
                    'catatan' => 'Karies gigi 46. Dilakukan tambal sementara, kontrol 1 minggu lagi.',
                    'obat' => ['Asam Mefenamat 500 mg', 'Amoxicillin 500 mg'],
                ],
            ],
            [
                'pasien' => 'nuraini@gmail.com',
                'dokter' => 'budi@gmail.com',
                'hari' => 'Rabu',
                'keluhan' => 'Anak usia 3 tahun demam tinggi dan rewel sejak semalam',
                'no_antrian' => 1,
                'periksa' => [
                    'tgl_periksa' => '2026-10-14 08:20:00',
                    'catatan' => 'Demam pada anak, belum ada tanda infeksi bakteri. Kompres hangat dan pantau suhu.',
                    'obat' => ['Paracetamol Sirup 120 mg/5 ml'],
                ],
            ],
            [
                'pasien' => 'bayu@gmail.com',
                'dokter' => 'rina@gmail.com',
                'hari' => 'Jumat',
                'keluhan' => 'Mata kanan merah, gatal, dan berair',
                'no_antrian' => 1,
                'periksa' => [
                    'tgl_periksa' => '2026-10-16 13:30:00',
                    'catatan' => 'Konjungtivitis. Hindari mengucek mata dan cuci tangan sebelum menyentuh mata.',
                    'obat' => ['Kloramfenikol Tetes Mata'],
                ],
            ],

            // Belum diperiksa (masih menunggu antrian)
            [
                'pasien' => 'pasien@gmail.com',
                'dokter' => 'dokter@gmail.com',
                'hari' => 'Kamis',
                'keluhan' => 'Batuk kering dan tenggorokan gatal',
                'no_antrian' => 1,
                'periksa' => null,
            ],
            [
                'pasien' => 'ahmad@gmail.com',
                'dokter' => 'andi@gmail.com',
                'hari' => 'Rabu',
                'keluhan' => 'Kontrol setelah demam, masih sedikit batuk',
                'no_antrian' => 1,
                'periksa' => null,
            ],
            [
                'pasien' => 'rizky@gmail.com',
                'dokter' => 'andi@gmail.com',
                'hari' => 'Rabu',
                'keluhan' => 'Nyeri ulu hati dan mual setelah makan',
                'no_antrian' => 2,
                'periksa' => null,
            ],
            [
                'pasien' => 'dewi@gmail.com',
                'dokter' => 'siti@gmail.com',
                'hari' => 'Kamis',
                'keluhan' => 'Gusi bengkak dan berdarah saat sikat gigi',
                'no_antrian' => 1,
                'periksa' => null,
            ],
        ];

        foreach ($pendaftarans as $pendaftaran) {
            $jadwal = JadwalPeriksa::where('hari', $pendaftaran['hari'])
                ->whereHas('dokter', fn ($query) => $query->where('email', $pendaftaran['dokter']))
                ->first();

            $daftarPoli = DaftarPoli::create([
                'id_pasien' => User::where('email', $pendaftaran['pasien'])->value('id'),
                'id_jadwal' => $jadwal->id,
                'keluhan' => $pendaftaran['keluhan'],
                'no_antrian' => $pendaftaran['no_antrian'],
            ]);

            if ($pendaftaran['periksa'] === null) {
                continue;
            }

            $obats = Obat::whereIn('nama_obat', $pendaftaran['periksa']['obat'])->get();

            $periksa = Periksa::create([
                'id_daftar_poli' => $daftarPoli->id,
                'tgl_periksa' => $pendaftaran['periksa']['tgl_periksa'],
                'catatan' => $pendaftaran['periksa']['catatan'],
                'biaya_periksa' => self::BIAYA_JASA_DOKTER + $obats->sum('harga'),
            ]);

            foreach ($obats as $obat) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obat->id,
                ]);
            }
        }
    }
}
