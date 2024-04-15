<?php

namespace Database\Seeders;

use App\Models\ReportPurpose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportPurpose::factory()->create([
            'fr' => 'insulte',
            'en' => 'insult',
        ]);
        ReportPurpose::factory()->create([
            'fr' => 'spam',
            'en' => 'spam',
        ]);
        ReportPurpose::factory()->create([
            'fr' => 'données sensibles',
            'en' => 'sensitive data',
        ]);
        ReportPurpose::factory()->create([
            'fr' => 'menace',
            'en' => 'threat',
        ]);
        ReportPurpose::factory()->create([
            'fr' => 'agression sexuelle',
            'en' => 'sexual assault',
        ]);
        ReportPurpose::factory()->create([
            'fr' => 'opinion politique',
            'en' => 'political opinion',
        ]);
    }
}
