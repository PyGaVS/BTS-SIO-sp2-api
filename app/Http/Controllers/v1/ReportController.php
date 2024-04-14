<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Report::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $message = Message::get()->where('id', $request['message_id'])->first();
        $chat =  Auth::user()->chat()->where('id', $message->chat_id)->first();

        if(!$chat){
            abort(403);
        }

        $importance_rate = 1;
        if(substr_count($message->content, 'kys')){
            $importanceRate = 4;
        }

        $report = Report::create([
            'purpose' => $request['purpose'],
            'content' => $request['content'] ?? '',
            'message_id' => $message->id,
            'importance_rate' => $importance_rate
        ]);

        $report['message'] = $message;

        return response()->json($report, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $report->message = $report->message()->get();
        return response()->json($report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
