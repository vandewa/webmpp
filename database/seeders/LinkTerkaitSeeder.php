<?php

namespace Database\Seeders;

use App\Models\LinkTerkait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkTerkaitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('link_terkaits')->truncate();
        $data = [
            [
                'nama' => 'Website Pemkab Wonosobo',
                'link' => 'https://wonosobokab.go.id',
            ],
            [
                'nama' => 'DPMPTSP Prov Jateng',
                'link' => 'https://dpmptsp.jatengprov.go.id/',
            ],
            [
                'nama' => 'CJIP',
                'link' => 'https://cjip.jatengprov.go.id/',
            ],
        ];

        foreach ($data as $datum) {
            LinkTerkait::create($datum);
        }
    }
}
