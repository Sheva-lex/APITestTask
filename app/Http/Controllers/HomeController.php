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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function redirect()
    {
        if (auth()->user()->isAdmin) {
            return redirect()->route('admin.home');
        }
        if (auth()->user()->isManager || auth()->user()->isUser) {
            return redirect()->route('home');
        }
    }

    public function index()
    {
        return view('home');
    }
}
