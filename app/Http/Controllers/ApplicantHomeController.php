<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $jobs = Job::with([
            'company' => function($query) {
                $query->where('status', Company::STATUS_ACCEPTED);
            }
        ])->paginate();
        
        $job_applications = auth()->user()->jobApplications()->get()->pluck('pivot.job_id');
        // dd($job_applications->toArray());

        return view('applicant/home', compact('jobs', 'job_applications'));
    }
}
