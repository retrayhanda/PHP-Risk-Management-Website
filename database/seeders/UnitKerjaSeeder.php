<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitKerja;


class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Unit = [
            [
                'kode_unit_kerja' => 'DPP',
                'unit_kerja' => 'Direktorat Pendidikan dan Pembelajaran',
            ],
            [
                'kode_unit_kerja' => 'DKM',
                'unit_kerja' => 'Direktorat Kemahasiswaan',
            ],
            [
                'kode_unit_kerja' => 'DKU',
                'unit_kerja' => 'Direktorat Keuangan',
            ],
            [
                'kode_unit_kerja' => 'DPB',
                'unit_kerja' => 'Direktorat Pengembangan Usaha dan Bisnis',
            ],
            [
                'kode_unit_kerja' => 'DSDM',
                'unit_kerja' => 'Direktorat Sumber Daya Manusia',
            ],
            [
                'kode_unit_kerja' => 'DTI',
                'unit_kerja' => 'Direktorat Teknologi Informasi dan Komunikasi',
            ],

            [
                'kode_unit_kerja' => 'DPE',
                'unit_kerja' => 'Direktorat Perencanaan dan Pengembangan',
            ],
            [
                'kode_unit_kerja' => 'DKH',
                'unit_kerja' => 'Direktorat Kerjasama dan Hilirisasi Riset',
            ],

            [
                'kode_unit_kerja' => 'FP',
                'unit_kerja' => 'Fakultas Pertanian',
            ],
            [
                'kode_unit_kerja' => 'FK',
                'unit_kerja' => 'Fakultas Kedokteran',
            ],

            [
                'kode_unit_kerja' => 'FH',
                'unit_kerja' => 'Fakultas Hukum',
            ],
            [
                'kode_unit_kerja' => 'FMIPA',
                'unit_kerja' => 'Fakultas Matematika & Ilmu Pengetahuan Alam',
            ],     
            [
                'kode_unit_kerja' => 'FEB',
                'unit_kerja' => 'Fakultas Ekonomi dan Bisnis',
            ],
            [
                'kode_unit_kerja' => 'FATERNA',
                'unit_kerja' => 'Fakultas Peternakan',
            ],
            [
                'kode_unit_kerja' => 'FIB',
                'unit_kerja' => 'Fakultas Ilmu Budaya',
            ],
            [
                'kode_unit_kerja' => 'FT',
                'unit_kerja' => 'Fakultas Teknik',
            ],
            [
                'kode_unit_kerja' => 'FISIP',
                'unit_kerja' => 'Fakultas Ilmu Sosial dan Ilmu Politik',
            ],
            [
                'kode_unit_kerja' => 'FF',
                'unit_kerja' => 'Fakultas Farmasi',
            ],
            [
                'kode_unit_kerja' => 'FTP',
                'unit_kerja' => 'Fakultas Teknologi Pertanian',
            ],
            [
                'kode_unit_kerja' => 'FKM',
                'unit_kerja' => 'Fakultas Kesehatan Masyarakat',
            ],
            [
                'kode_unit_kerja' => 'FKEP',
                'unit_kerja' => 'Fakultas Keperawatan',
            ],
            [
                'kode_unit_kerja' => 'FKG',
                'unit_kerja' => 'Fakultas Kedokteran Gigi',
            ],
            [
                'kode_unit_kerja' => 'FTI',
                'unit_kerja' => 'Fakultas Teknologi Informasi',
            ],
            [
                'kode_unit_kerja' => 'SPS',
                'unit_kerja' => 'Sekolah Pascasarjana',
            ],
            [
                'kode_unit_kerja' => 'RSUA',
                'unit_kerja' => 'Rumah Sakit UNAND',
            ],
            [
                'kode_unit_kerja' => 'LPPM',
                'unit_kerja' => 'Lembaga Penelitian dan Pengabdian Masyarakat',
            ],
            [
                'kode_unit_kerja' => 'LPM',
                'unit_kerja' => 'Lembaga Penjaminan Mutu',
            ],
            [
                'kode_unit_kerja' => 'SPI',
                'unit_kerja' => 'Satuan Pengawas Internal',
            ],
            [
                'kode_unit_kerja' => 'KHPIP',
                'unit_kerja' => 'Kantor Humas Protokoler dan Layanan Informasi Publik',
            ],
            [
                'kode_unit_kerja' => 'KHOMR',
                'unit_kerja' => 'Kantor Hukum, Organisasi dan Manajemen Risiko',
            ],
            [
                'kode_unit_kerja' => 'KLI',
                'unit_kerja' => 'Kantor Layanan Internasional',
            ],
            [
                'kode_unit_kerja' => 'KTUA',
                'unit_kerja' => 'Kantor Tata Usaha dan Arsip',
            ],
            [
                'kode_unit_kerja' => 'KPKLU',
                'unit_kerja' => 'Kantor Pengelola Kampus diluar Kampus Utama',
            ],
            [
                'kode_unit_kerja' => 'UPA',
                'unit_kerja' => 'UPT Asrama',
            ],
            [
                'kode_unit_kerja' => 'UPP',
                'unit_kerja' => 'UPT Perpustakaan',
            ],
            [
                'kode_unit_kerja' => 'UPB',
                'unit_kerja' => 'UPT Pusat Bahasa',
            ],
            [
                'kode_unit_kerja' => 'UPLS',
                'unit_kerja' => 'UPT Laboratorium Sentral',
            ],
            [
                'kode_unit_kerja' => 'UPBLK',
                'unit_kerja' => 'UPT Belajar di Luar Kampus',
            ],
        ];

        foreach ($Unit as $key => $val) {
            UnitKerja::create($val);
        }
    }
}
