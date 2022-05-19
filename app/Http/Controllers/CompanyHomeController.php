<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
// use Illuminate\Http\Request;

class CompanyHomeController extends Controller
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
        // dd('hit');
        return view('company/home', compact('jobs'));
    }
}
