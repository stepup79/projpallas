<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('backend.dashboard');
    }
}
