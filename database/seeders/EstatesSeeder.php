<?php

namespace Database\Seeders;

use App\Models\Estates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estates::factory()->count(50)->create();
    }
}
