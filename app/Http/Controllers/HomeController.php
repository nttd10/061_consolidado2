<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Procedure;
use App\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        switch (Auth::user()->rol_id) {
            case '1':
                return redirect()->route('listings');
            break;
            case '2':
                return view('adminModules.moduleSelect');
            break;
        }
    }
}
