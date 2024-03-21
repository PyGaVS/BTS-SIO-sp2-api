<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Report;
use App\Models\Sanction;
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
        $reports = Report::factory(15)->create();
        foreach($reports as $report){
            $message = Message::find($report->message_id);
            if($report->importance_rate >= 4){
                Sanction::factory()->create([
                    'kindness_score' => 10,
                    'user_id' => $message->user_id,
                    'report_id' => $report->id,
                    'end_ban_time' => now()->addHour(1)
                ]);
            } elseif (rand(1, 4) == 4){
                Sanction::factory()->create([
                    'kindness_score' => 5,
                    'user_id' => $message->user_id,
                    'report_id' => $report->id
                ]);
            }
        }
    }
}
