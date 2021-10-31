<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
            return redirect()->route('cabinet');
        }
    }

    public function index()
    {
        return view('main');
    }

    public function cabinet()
    {
        return view('cabinet');
    }
}
