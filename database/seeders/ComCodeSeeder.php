<?php

namespace Database\Seeders;

use App\Models\ComCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('com_codes')->truncate();
        $data = [
            ['code_cd' => 'KATEGORI_TP_01', 'code_nm' => 'Berita', 'code_group' => 'KATEGORI_TP', 'code_value' => ''],
            ['code_cd' => 'KATEGORI_TP_02', 'code_nm' => 'Prestasi & Inovasi', 'code_group' => 'KATEGORI_TP', 'code_value' => ''],
        ];

        foreach ($data as $datum) {
            ComCode::create($datum);
        }
    }
}
