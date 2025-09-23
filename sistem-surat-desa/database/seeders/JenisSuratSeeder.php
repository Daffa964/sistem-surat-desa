<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurat = [
            [
                'kode_surat' => 'SKTM',
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'template_path' => 'surat.sktm'
            ],
            [
                'kode_surat' => 'SKU',
                'nama_surat' => 'Surat Keterangan Usaha',
                'template_path' => 'surat.sku'
            ],
            [
                'kode_surat' => 'SKD',
                'nama_surat' => 'Surat Keterangan Domisili',
                'template_path' => 'surat.skd'
            ],
            [
                'kode_surat' => 'SKCK',
                'nama_surat' => 'Surat Keterangan Catatan Kepolisian',
                'template_path' => 'surat.skck'
            ],
            [
                'kode_surat' => 'SKL',
                'nama_surat' => 'Surat Keterangan Lahir',
                'template_path' => 'surat.skl'
            ]
        ];

        foreach ($jenisSurat as $surat) {
            JenisSurat::create($surat);
        }
    }
}
