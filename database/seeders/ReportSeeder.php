<?php

namespace Database\Seeders;

use App\Models\Report;
use Database\Factories\ReportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::factory(15)->create();
    }
}
