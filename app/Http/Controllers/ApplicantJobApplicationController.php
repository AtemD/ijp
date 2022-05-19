<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantJobApplicationController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::where('id', $request->job_id)->firstOrFail();
        auth()->user()->jobApplications()->attach($job->id, ['company_id' => $job->company_id]);

        return back()->with('success', 'You have successfully applied to the job');
        // auth()->user()->jobApplications()->attach($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }
}
