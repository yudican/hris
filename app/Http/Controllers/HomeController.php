<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // $this->middleware('isAuthorization');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return auth()->user()->roles()->pluck('name');
        if (auth()->user()->roles()->first()->name == 'user') {
            return view('user.index', ['title' => 'Recruitmen Management System']);
        }
        return view('admin.index', ['title' => 'Dashboard']);
    }
}
