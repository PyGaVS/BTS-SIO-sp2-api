<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             RolesAndPermissionSeeder::class,
             RegionSeeder::class,
             UserSeeder::class,
             CertificationRequestSeeder::class,
             ChatSeeder::class,
             MessageSeeder::class,
             ReportPurposeSeeder::class,
             ReportSeeder::class,
             SanctionSeeder::class,
         ]);
    }
}
