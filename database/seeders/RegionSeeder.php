<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/country.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if(!$firstLine){
                $coutry = Region::create([
                    'name' => $data[1],
                    'short_name' => $data[0]
                ]);
            }
            $firstLine = false;
        }
        fclose($csvFile);
    }
}
