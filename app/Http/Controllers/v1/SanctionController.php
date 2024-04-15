<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSanctionRequest;
use App\Http\Requests\UpdateSanctionRequest;
use App\Models\Sanction;

class SanctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sanction::with('report')->get();
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
    public function store(StoreSanctionRequest $request)
    {
        $sanction = Sanction::create([
            'kindness_score' => $request['kindness_score'],
            'start_ban_time' => date(now()),
            'end_ban_time' => $request['end_ban_time'],
            'user_id' => $request['user_id'],
            'report_id' => $request['report_id'],
        ]);
        return response()->json($sanction, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sanction $sanction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sanction $sanction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSanctionRequest $request, Sanction $sanction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sanction $sanction)
    {
        //
    }
}
