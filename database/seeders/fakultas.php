<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fakultas extends Seeder
{
    public function run()
    {
        DB::table('fakultas')->insert([
            ['id' => 1, 'nama_fakultas' => 'MIPA'],
            ['id' => 2, 'nama_fakultas' => 'Teknik'],
            ['id' => 3, 'nama_fakultas' => 'Ekonomi'],
            ['id' => 4, 'nama_fakultas' => 'Hukum'],
            ['id' => 5, 'nama_fakultas' => 'Ilmu Sosial dan Politik'],
        ]);
    }
}
