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
            ['code_cd' => 'JENIS_INFORMASI_PUBLIK_TP_01', 'code_nm' => 'INFORMASI WAJIB DIUMUMKAN SECARA BERKALA', 'code_group' => 'JENIS_INFORMASI_PUBLIK_TP', 'code_value' => ''],
        ];

        foreach ($data as $datum) {
            ComCode::create($datum);
        }
    }
}
