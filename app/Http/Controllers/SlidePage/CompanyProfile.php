<?php

namespace App\Http\Controllers\SlidePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfile extends Controller
{
    public function index()
    {
        return view('slide-page.company-profile');
    }
}
