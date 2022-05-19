<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class CompanyAccountController extends Controller
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
        $company = auth()->user()->company()->get();

        return view('company/account/show', compact('company'));
    }
}
