<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courier::create(['name' => 'JNE']);
        Courier::create(['name' => 'TIKI']);
        Courier::create(['name' => 'Pos Indonesia']);
    }
}
