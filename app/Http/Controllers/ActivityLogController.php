<?php

namespace App\Http\Controllers;

use App\Models\activityLog;
use App\Http\Requests\StoreactivityLogRequest;
use App\Http\Requests\UpdateactivityLogRequest;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreactivityLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreactivityLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\activityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show(activityLog $activityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\activityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function edit(activityLog $activityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateactivityLogRequest  $request
     * @param  \App\Models\activityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateactivityLogRequest $request, activityLog $activityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\activityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(activityLog $activityLog)
    {
        //
    }
}
