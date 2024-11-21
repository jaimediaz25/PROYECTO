<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class seeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
    
        foreach (range(1, 10) as $index) {
        DB::table('migrar1')->insert([
            'name' => $faker->name,
            'description' => $faker->text(20),
            'categoria' => $faker->word,
            
        ]);
    }
    }
}
