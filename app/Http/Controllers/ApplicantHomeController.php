<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
// use Illuminate\Http\Request;

class ApplicantHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'company.setup']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $jobs = Job::with('company')->paginate();
        
        $job_applications = auth()->user()->jobApplications()->get()->pluck('pivot.job_id');
        // dd($job_applications->toArray());

        return view('applicant/home', compact('jobs', 'job_applications'));
    }
}
