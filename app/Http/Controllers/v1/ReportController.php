<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return Report::with(['message.user', 'report_purpose'])->get();
        return Report::leftJoin('sanctions', 'report_id', '=', 'reports.id')
            ->select('reports.*')
            ->where('sanctions.report_id')
            ->with(['message.user'])->get();
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
//        $request = Report::create([
//            ''
//        ])
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
