<?php

namespace Database\Seeders;

use App\Models\InformasiUmum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformasiUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informasi_umums')->truncate();
        $data = [
            [
                'id' => '1',
                'telepon' => '(0286) 321059',
                'email' => 'dpmptsp.wsb@gmail.com',
                'alamat' => 'Jl. Kartini No. 11, Kab. Wonosobo',
                'fb' => '',
                'twitter' => '',
                'yt' => '',
                'ig' => 'https://www.instagram.com/dpmptsp_wonosobo/',
                'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.957395193814!2d109.89797057500063!3d-7.358672792650373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa0f85fde3dd1%3A0x55011d556218bc3a!2sDPMPTSP%20Kabupaten%20Wonosobo!5e0!3m2!1sid!2sid!4v1699073352731!5m2!1sid!2sid" width="300" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
        ];

        foreach ($data as $datum) {
            InformasiUmum::create($datum);
        }
    }
}
