<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabla1')->insert([
            [
                'name' => 'LECTURA',
                'description' => 'Obten tu contancia',
                'categoria' => 'Taller',
            ],
            [
                'name' => 'FUTBOL',
                'description' => 'Obten tu contancia',
                'categoria' => 'Taller',
            ],
            [
                'name' => 'TOCHO',
                'description' => 'Obten tu contancia',
                'categoria' => 'Taller',
            ],
        ]);
    }
}
