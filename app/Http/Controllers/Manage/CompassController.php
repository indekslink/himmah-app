<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompassController extends Controller
{
    public function index()
    {
        return view('slide-page.compass');
    }
}
