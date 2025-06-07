<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKomponenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_komponen')->insert([
            ['nama_jenis' => 'Resistor', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Kapasitor', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Transistor', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'Dioda', 'created_at' => now(), 'updated_at' => now()],
            ['nama_jenis' => 'IC (Integrated Circuit)', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
